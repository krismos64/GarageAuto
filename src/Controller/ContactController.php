<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Repository\MessagesRepository;
use App\Repository\SchedulesRepository;
use App\Form\ContactType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    private $entityManager;
    private $contactRepository;

    public function __construct(EntityManagerInterface $entityManager, MessagesRepository $contactRepository)
    {
        $this->entityManager = $entityManager;
        $this->contactRepository = $contactRepository;
    }
    #[Route('/contact', name: 'app_contact')]
    public function index(SchedulesRepository $schedulesRepository, Request $request): Response
    {
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $workingHours = [];
        
        foreach ($days as $day) {
        $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
        }

         // Create an empty form to pass to the template
    $contact = new Messages();
    $form = $this->createForm(ContactType::class, $contact);

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'workingHours' => $workingHours,
            'form' => $form->createView(),
        ]);
    }
    public function new(Request $request, SchedulesRepository $openingDaysRepository, CarRepository $usedCarRepository ): Response
    {
        $contact = new Messages();
        $form = $this->createForm(ContactType::class, $contact, [
        'label' => [
        'firstName' => 'Prénom',
        'lastName' => 'Nom',
        'email' => 'E-mail',
        'phoneNumber' => 'Votre numéro de téléphone',
        'content' => 'Votre demande',
        ],
    ]);

      
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_contact_success');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/contact/success', name: 'app_contact_success', methods: ['GET'])]
    public function success(): Response
    {
        return $this->render('contact/success.html.twig');
    }

    #[Route('/admin', name: 'admin_contact')]
    public function adminContact(): Response
    {
        $contact = $this->contactRepository->findAll();

        return $this->render('contact/admin_contact.html.twig', [
            'contact' => $contact,
        ]);
    }

    #[Route('/admin/contact/approve/{id}', name: 'admin_contact_approve')]
    public function approveContact(Messages $contact): Response
    {
        $contact->setApproved(true);
        $this->entityManager->flush();

        return $this->redirectToRoute('admin_contact');
    }

    #[Route('/admin/contact/disapprove/{id}', name: 'admin_contact_disapprove')]
    public function disapproveContact(Messages $contact): Response
    {
        $contact->setApproved(false);
        $this->entityManager->flush();

        return $this->redirectToRoute('admin_contact');
    }
    }
        




















