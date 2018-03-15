<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cour controller.
 *
 * @Route("cours")
 */
class CoursController extends Controller
{


    /**
     * Lists all cour entities.
     *
     * @Route("/", name="cours_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $cours = $em->getRepository('AppBundle:Cours')->findAll();

        return $this->render('cours/index.html.twig', array(
            'cours' => $cours,
        ));
    }

    /**
     * Creates a new cour entity.
     *
     * @Route("/new", name="cours_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cours = new Cours();
        $form = $this->createForm('AppBundle\Form\CoursType', $cours);
        $form->handleRequest($request);

        //$idUser = $this->container->get('security.token_storage')->getToken()->getUser()->getId();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idUser = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
            $etudiant= $em->getRepository('AppBundle\Entity\Etudiant')
                ->findOneBy(['id'=>$idUser]);
            $cours->addEtudiant($etudiant);
            $em->persist($cours);
            $em->flush();

            return $this->redirectToRoute('cours_show', array('id' => $cours->getId()));
        }

        return $this->render('cours/new.html.twig', array(
            'cours' => $cours,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cour entity.
     *
     * @Route("/{id}", name="cours_show")
     *
     * @Method("GET")
     */
    public function showAction(Cours $cours)
    {
        $em = $this->getDoctrine()->getManager();
        $idUser = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
        $deleteForm = $this->createDeleteForm($cours);
        $etudiant = $em->getRepository('AppBundle\Entity\Etudiant')
            ->findOneBy(['id' => $idUser]);

        return $this
            ->render('cours/show.html.twig', array(
                'cour' => $cours,
                'etudiant'=>$etudiant,
                'delete_form' => $deleteForm->createView(),
            ));
    }

    /**
     * Reserver un cours avec ManyToMany.
     *
     * @Route("/{id}/reserve", name="cours_reserve")
     * @Method({"GET", "POST"})
     */
    public function reserveAction(Cours $cours)
    {
        $em = $this->getDoctrine()->getManager();

        $idUser = $this->container->get('security.token_storage')->getToken()->getUser()->getId();

        $etudiant = $em->getRepository('AppBundle\Entity\Etudiant')
            ->findOneBy(['id' => $idUser]);
        $cours->addEtudiant($etudiant);
        $etudiant->addCours($cours);
        $em->flush($cours,$etudiant);

        return $this->render('cours/list.html.twig', array(
            'cour'=>$cours,
            'etudiant'=>$etudiant,
        ));
    }

    /**
     * Desincrire un cours avec ManyToMany.
     *
     * @Route("/{id}/desinscrire", name="cours_desinscrire")
     * @Method({"GET", "POST"})
     */
    public function desinscrireAction(Cours $cours)
    {
        $em = $this->getDoctrine()->getManager();

        $idUser = $this->container->get('security.token_storage')->getToken()->getUser()->getId();

        $etudiant = $em->getRepository('AppBundle\Entity\Etudiant')
            ->findOneBy(['id' => $idUser]);
        $cours->removeEtudiant($etudiant);
        $etudiant->removeCours($cours);
        $em->flush($cours,$etudiant);
        return $this->render('cours/list.html.twig', array(
            'cour'=>$cours,
            'etudiant'=>$etudiant,
        ));
    }

    /**
     * Desincrire un cours avec ManyToMany.
     *
     * @Route("/{id}/list", name="cours_list")
     * @Method({"GET", "POST"})
     */
    public function listAction(Cours $cours)
    {
        $em = $this->getDoctrine()->getManager();

        $idUser = $this->container->get('security.token_storage')->getToken()->getUser()->getId();

        $etudiant = $em->getRepository('AppBundle\Entity\Etudiant')
            ->findOneBy(['id' => $idUser]);
        $em->flush($cours,$etudiant);
        return $this->render('cours/list.html.twig', array(
            'cour'=>$cours,
            'etudiant'=>$etudiant,
        ));
    }

    /*
        /**
         * Finds and displays a cour entity.
         *
         * @Route("/", name="cours_list")
         *
         * @Method({"GET", "POST"})
         */
    /*
        public function listAction(Request $request)
        {
            $em = $this->getDoctrine()->getManager();
            $cours = $em->getRepository('AppBundle:Cours')->findAll();
            $form = $this->createForm('AppBundle\Form\ReserveCoursType',$cours);
            $form->handleRequest($request);
            $options = $form->get('id')->getConfig()->getOptions();
            $choices = $options['choice_list']->getChoices();
            $form2 = $form->getdata();
            var_dump($form2->getid());


            $idUser = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
            $etudiant= $em->getRepository('AppBundle\Entity\Etudiant')
                ->findOneBy(['id'=>$idUser]);



            $etudiant->addCours($choices);

            return $this->render('cours/list.html.twig', array(
                'cours' => $cours,
                'form2' => $form->createView()
            ));
        }*/


    /**
     * Displays a form to edit an existing cour entity.
     *
     * @Route("/{id}/edit", name="cours_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cours $cours)
    {
        $deleteForm = $this->createDeleteForm($cours);
        $editForm = $this->createForm('AppBundle\Form\CoursType', $cours);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cours_edit', array('id' => $cours->getId()));
        }

        return $this->render('cours/edit.html.twig', array(
            'cour' => $cours,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cour entity.
     *
     * @Route("/{id}", name="cours_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cours $cours)
    {
        $form = $this->createDeleteForm($cours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cours);
            $em->flush();
        }

        return $this->redirectToRoute('cours_index');
    }

    /**
     * Creates a form to delete a cour entity.
     *
     * @param Cours $cour The cour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cours $cours)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cours_delete', array('id' => $cours->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
