<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pracownicy;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PracownicyFormType;

class PracownicyController extends Controller
{
    /**
     * @Route("/pracownicy/lista", name="lista_pracownikow")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listaPracownikow  = $em->getRepository('AppBundle\Entity\Pracownicy')->findAll();

        return $this->render('pracownicy/lista.html.twig', [
            'pracownicy' => $listaPracownikow
        ]);
    }

    /**
     * @Route("/pracownicy/dodaj", name="dodaj_pracownika_form")
     */
    public function dodajAction()
    {
        $form = $this->createForm(PracownicyFormType::class);

        return $this->render('pracownicy/dodaj.html.twig', [
            'pracownicyForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/pracownicy/zapisz", name="zapisz_pracownika")
     */
    public function zapiszAction(Request $request)
    {
        $form = $this->createForm(PracownicyFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pracownik = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($pracownik);
            $em->flush();

            return $this->redirectToRoute('lista_pracownikow');
        }
    }


}
