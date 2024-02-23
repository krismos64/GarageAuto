<?php

namespace App\Controller;

use App\Entity\Reviews;
use App\Form\ReviewsType;
use App\Repository\ReviewsRepository;
use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface; 

class ReviewsController extends AbstractController
{
    #[Route('/avis-clients', name: 'app_reviews', methods: ['GET', 'POST'])]
    public function index(Request $request, ReviewsRepository $reviewsRepository, SchedulesRepository $schedulesRepository): Response
    {
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $reviews = $reviewsRepository->findAll();
        $workingHours = [];

        foreach ($days as $day) {
            $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
        }

        $review = new Reviews();
        $form = $this->createForm(ReviewsType::class, $review);
        $form->handleRequest($request);

        $errors = $form->getErrors(true, false);

        if ($form->isSubmitted() && $form->isValid()) {
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

    // Modification de la signature pour utiliser l'injection de dépendances
    private function saveReview(Reviews $review): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($review);
        $entityManager->flush();
    }
}