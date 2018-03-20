<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reponse;
use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reponse controller.
 *
 * @Route("reponse")
 */
class ReponseController extends Controller
{
    /**
     * Lists all reponse entities.
     *
     * @Route("/reponse", name="reponse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reponses = $em->getRepository('AppBundle:Reponse')->findAll();

        return $this->render('reponse/index.html.twig', array(
            'reponses' => $reponses,
        ));
    }

    /**
     * Creates a new reponse entity.
     *
     * @Route("/new", name="reponse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reponse=new Reponse();
        $questionid=$request->query->get('question');
        $form = $this->createForm('AppBundle\Form\ReponseType', $reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();



            $question=$em->getRepository('AppBundle:Question')
                ->find($questionid);
            $reponse->setQuestion($question);
            $em->persist($reponse);
            $em->flush();
            return $this->redirectToRoute('question_show', array('id'=>$question->getId(),'reponse'=>$reponse));

        }



        return $this->render('reponse/new.html.twig', array(

            'reponse' => $reponse,

            'form' => $form->createView(),

        ));

    }


    /**
     * Finds and displays a reponse entity.
     *
     * @Route("/{id}", name="reponse_show")
     * @Method("GET")
     */
    public function showAction(Reponse $request)
    {
        $deleteForm = $this->createDeleteForm($request);

        return $this->render('reponse/show.html.twig', array(
            'reponse' => $request,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reponse entity.
     *
     * @Route("/{id}/edit", name="reponse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reponse $reponse)
    {
        $deleteForm = $this->createDeleteForm($reponse);
        $editForm = $this->createForm('AppBundle\Form\ReponseType', $reponse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reponse_edit', array('id' => $reponse->getId(),));
        }

        return $this->render('reponse/edit.html.twig', array(
            'reponse' => $reponse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


        /**

         * Finds and displays a cour entity.

         *

         * @Route("/", name="reponse_list")

         *

         * @Method({"GET", "POST"})

         */


    public function listAction(Reponse $reponses)

    {

        $em = $this->getDoctrine()->getManager();


        $question = $em->getRepository('AppBundle\Entity\Question')
            ->findOneBy(['id' => $reponses]);

        $em->flush($reponses, $question);

        return $this->render('reponse/list.html.twig', array(

            'reponse' => $reponses,

            'question' => $question,

        ));
    }

    /**
     * Deletes a reponse entity.
     *
     * @Route("/{id}", name="reponse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reponse $reponse)
    {
        $form = $this->createDeleteForm($reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reponse);
            $em->flush();
        }

        return $this->redirectToRoute('reponse_index');
    }

    /**
     * Creates a form to delete a reponse entity.
     *
     * @param Reponse $reponse The reponse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reponse $reponse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reponse_delete', array('id' => $reponse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
