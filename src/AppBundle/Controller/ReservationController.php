<?php
/**
 * Created by PhpStorm.
 * User: zhaow
 * Date: 2018/3/4
 * Time: 19:23
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class ReservationController extends Controller
{
    /**
     * @Route("/reservation", name="reservation_cours")
     * @Method({"GET", "POST"})
     */
    public function afficheAction()
    {
        // retourne page reservation
        return $this->render('reservation/cours.html.twig');

    }

    /*/**
     * @Route("/reservation", name="reservation_reservation")
     * @Method({"GET", "POST"})
     */
    /*public function reserveAction(Choix $choix)
    {
        // retourne page choix de la reservation
        return $this->render('reservation/reservation.html.twig', array(
            'choix' => $choix
        ));

    }
    */
}