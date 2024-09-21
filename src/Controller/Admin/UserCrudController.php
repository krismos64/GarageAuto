<?php


namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserCrudController extends AbstractCrudController
{
    public function __construct(
        private EntityRepository $entityRepo,
        private UserPasswordHasherInterface $passwordHasher,
        private ValidatorInterface $validator,
        private RequestStack $requestStack
    ) {}

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $userId = $this->getUser()->getId();

        $response = $this->entityRepo->createQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $response->andWhere('entity.id != :userId')->setParameter('userId', $userId);

        return $response;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('firstname', 'Nom');
        yield TextField::new('lastname', 'Prénom');
        yield EmailField::new('email', 'Email');

        yield TextField::new('password', 'Mot de passe')
            ->onlyOnForms()
            ->setFormType(PasswordType::class);

        yield ChoiceField::new('roles', 'Rôle à attribuer')
            ->allowMultipleChoices()
            ->setChoices([
                'Employé' => 'ROLE_ADMIN',
                'Patron' => 'ROLE_SUPER_ADMIN',
            ]);
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        /** @var User $user */
        $user = $entityInstance;

        // Validate user entity
        $errors = $this->validator->validate($user);
        if (count($errors) > 0) {
            $session = $this->requestStack->getSession();
            foreach ($errors as $error) {
                $this->addFlash('error', $error->getMessage());
            }
            // Redirect back to the form if validation fails
            $referrer = $this->requestStack->getCurrentRequest()->headers->get('referer');
            (new RedirectResponse($referrer))->send();
            exit;
        }

        $plainPassword = $user->getPassword();
        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);

        parent::persistEntity($entityManager, $user);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un utilisateur')
            ->setPageTitle('index', 'Utilisateurs du site web du garage V.Parrot')
            ->setPageTitle('new', 'Créer un nouvel utilisateur')
            ->setPaginatorPageSize(20);
    }
}
