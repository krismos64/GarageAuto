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
use Symfony\Component\Form\FormFactoryInterface;

class ReviewsController extends AbstractController
{
    private $entityManager;
    private $reviewsRepository;
    private $schedulesRepository;
    private $formFactory;

    public function __construct(EntityManagerInterface $entityManager, ReviewsRepository $reviewsRepository, SchedulesRepository $schedulesRepository, FormFactoryInterface $formFactory)
    {
        $this->entityManager = $entityManager;
        $this->reviewsRepository = $reviewsRepository;
        $this->schedulesRepository = $schedulesRepository;
        $this->formFactory = $formFactory;
    }

    #[Route('/customer-reviews', name: 'app_reviews', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $reviews = $this->reviewsRepository->findAll();
        $workingHours = [];

        foreach ($days as $day) {
            $workingHours[$day] = $this->schedulesRepository->findWorkingHoursByDay($day);
        }

        $review = new Reviews();
        $form = $this->formFactory->create(ReviewsType::class, $review);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($review);
            $this->entityManager->flush();

            $this->addFlash('success', 'Review submitted successfully.');

            return $this->redirectToRoute('app_reviews');
        }

        return $this->render('reviews/index.html.twig', [
            'controller_name' => 'ReviewsController',
            'workingHours' => $workingHours,
            'reviews' => $reviews,
            'review_form' => $form->createView(),
            'errors' => $form->getErrors(true, false),
        ]);
    }
}
