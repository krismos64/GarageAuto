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

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($review);
            $entityManager->flush();

            $this->addFlash('success', 'Votre avis a été soumis avec succès! Il sera publié après approbation.');

            // Vous pouvez rediriger vers la même page pour éviter de renvoyer le formulaire avec un rechargement de la page.
            return $this->redirectToRoute('app_reviews');
        }

        return $this->render('reviews/index.html.twig', [
            'controller_name' => 'ReviewsController',
            'workingHours' => $workingHours,
            'reviews' => $reviews,
            'form' => $form->createView(),
        ]);
    }
}
