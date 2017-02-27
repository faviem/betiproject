<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Encaissement;
use AppBundle\Form\EncaissementType;

class EncaissementController extends Controller {

    /**
     * @Route("/encaissement/read", name="read_encaissement")
     * @Method("GET")
     */
    public function read_encaissementAction(Request $request) {
        // replace this example code with whatever you need

        $exercices= $this->getDoctrine()
            ->getManager()->getRepository('AppBundle:Exercice')
            ->findBy(Array(),Array('libExercice'=>'ASC'));

        $encaissements= $this->getDoctrine()
            ->getManager()->getRepository('AppBundle:Encaissement')
            ->findBy(Array('exercice'=>$request->get('exercice')),Array('id'=>'ASC'));

        return $this->render('encaissement/encaissement/read_encaissement.html.twig', [
            'encaissements' => $encaissements,'exercice'=>$request->get('exercice'),'exercices'=> $exercices,
        ]);

    }

    /**
     * Creates a new demand entity.
     *
     * @Route("/encaissement/create", name="create_encaissement")
     * @Method({"GET", "POST"})
     */
    public function create_encaissementAction(Request $request)
    {
        $encaissement = new Encaissement();
        $form = $this->createForm('AppBundle\Form\EncaissementType', $encaissement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $encaissement->setExercice($this->getDoctrine()->getManager()->getRepository('AppBundle:Exercice')->find($request->get('exercice')));
            $em->persist($encaissement);
            $em->flush();
            $this->addFlash(
                'success', "Enregistrement effectué avec succès !"
            );

            return $this->redirectToRoute('create_encaissement', array('exercice' => $request->get('exercice')));
        }
        return $this->render('encaissement/encaissement/create_encaissement.html.twig', [
             'form'   => $form->createView(),'exercice'=>$request->get('exercice')
        ]);
    }

    /**
     * Creates a new demand entity.
     *
     * @Route("/encaissement/update", name="update_encaissement")
     * @Method({"GET", "POST"})
     */
    public function update_encaissementAction(Request $request)
    {
        $encaissement = $this->getDoctrine()->getManager()->getRepository('AppBundle:Encaissement')
            ->find($request->get('id'));
        $form = $this->createForm('AppBundle\Form\EncaissementType', $encaissement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->flush();
            $this->addFlash(
                'success', "Modification effectué avec succès !"
            );

            return $this->redirectToRoute('read_encaissement', array('exercice' =>$encaissement->getExercice()->getId()));
        }
        return $this->render('encaissement/encaissement/update_encaissement.html.twig', [
            'form'   => $form->createView(), 'id'   => $request->get('id'),'exercice'=>$request->get('exercice')
        ]);
    }

    /**
     * Creates a new demand entity.
     *
     * @Route("/encaissement/delete", name="delete_encaissement")
     * @Method({"GET", "POST"})
     */
    public function delete_encaissementAction(Request $request)
    {
        $encaissement = $this->getDoctrine()->getManager()->getRepository('AppBundle:Encaissement')
            ->find($request->get('id'));
        if ($request->getMethod() == 'POST'){
            $em = $this->getDoctrine()->getManager();
            $em->remove($encaissement);
            $em->flush();
            $this->addFlash(
                'success', "Modification effectué avec succès !"
            );

            return $this->redirectToRoute('read_encaissement', array('exercice' =>$encaissement->getExercice()->getId()));
        }
        return $this->render('encaissement/encaissement/delete_encaissement.html.twig', [
           'id'   => $request->get('id'),'exercice'=>$request->get('exercice')
        ]);
    }

}