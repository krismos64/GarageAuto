<?php

namespace App\Controller;

use App\Entity\Reviews;
use App\Form\ReviewsType;
use App\Repository\ReviewsRepository;
use App\Repository\SchedulesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReviewsController extends AbstractController
{
    private $entityManager;
    private $reviewsRepository;
    private $schedulesRepository;

    public function __construct(EntityManagerInterface $entityManager, ReviewsRepository $reviewsRepository, SchedulesRepository $schedulesRepository)
    {
        $this->entityManager = $entityManager;
        $this->reviewsRepository = $reviewsRepository;
        $this->schedulesRepository = $schedulesRepository;
    }

    #[Route('/avis-clients', name: 'app_reviews', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $reviews = $this->reviewsRepository->findAll();
        $workingHours = [];

        foreach ($days as $day) {
            $workingHours[$day] = $this->schedulesRepository->findWorkingHoursByDay($day);
        }

        $review = new Reviews();
        $form = $this->createForm(ReviewsType::class, $review);
        $form->handleRequest($request);

        $errors = $form->getErrors(true, false);

        if ($form->isSubmitted() && $form->isValid()) {
            $review->setIsApproved(false); 
            $this->saveReview($review);
            $this->addFlash('success', 'Votre avis a été soumis avec succès! Il sera publié après approbation.');

            return $this->redirectToRoute('app_reviews');
        }

        return $this->render('reviews/index.html.twig', [
            'controller_name' => 'ReviewsController',
            'workingHours' => $workingHours,
            'reviews' => $reviews,
            'form' => $form->createView(),
            'errors' => $errors,
        ]);
    }

    private function saveReview(Reviews $review): void
    {
        $this->entityManager->persist($review);
        $this->entityManager->flush();
    }
}
