<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\ContactType;
use App\Repository\SchedulesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/contact', name: 'app_contact')]
    public function index(SchedulesRepository $schedulesRepository, Request $request): Response
    {
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $workingHours = [];

        foreach ($days as $day) {
            $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
        }

        // Create a new instance of the Message entity
        $message = new Message();

        // Create the form using the ContactType form type and pass the $message object
        $form = $this->createForm(ContactType::class, $message);
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the message entity
            $this->entityManager->persist($message);
            $this->entityManager->flush();

            // Redirect to the success page after successful form submission
            return $this->redirectToRoute('app_contact_success');
        }

        // Render the contact form template
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'workingHours' => $workingHours,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/contact/success', name: 'app_contact_success', methods: ['GET'])]
    public function success(SchedulesRepository $schedulesRepository): Response
    {
        // Fetch the working hours again for the success page
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $workingHours = [];

        foreach ($days as $day) {
            $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
        }

        // Render the success page template
        return $this->render('contact/success.html.twig', [
            'workingHours' => $workingHours,
        ]);
    }
}
