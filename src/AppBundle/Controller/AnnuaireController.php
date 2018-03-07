<?php
/**
 * Created by PhpStorm.
 * User: Mbape
 * Date: 21/02/2018
 * Time: 14:51
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class AnnuaireController extends Controller
{
    /**
     * @Route("/annuaire", name="annuaire_recherche")
     * @Method({"GET", "POST"})
     */
    public function rechercheAction()
    {
        // retourne page annuaire
        return $this->render('annuaire/recherche.html.twig');

    }

    /**
     * @Route("/annuaire/{id}", name="annuaire_fiche")
     * @Method({"GET", "POST"})
     */
    public function ficheAction(User $user)
    {
        // retourne page user de l'annuaire
        return $this->render('annuaire/fiche.html.twig', array(
            'user' => $user
        ));

    }
}