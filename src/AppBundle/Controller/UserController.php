<?php
/**
 * Created by PhpStorm.
 * User: Mbape
 * Date: 20/02/2018
 * Time: 21:40
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class UserController extends Controller
{
//
//    /**
//     * @Route("/", name="FOSUserBundle_Security_login")
//     * @Method({"GET", "POST"})
//     */
//    public function loginAction(Request $request)
//    {
//
//        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
//            // retourne au menu
//            return $this->redirectToRoute('menu');
//        } else {
//            // retourne à l'accueil
//            return $this->render('FOSUserBundle/Security/login.html.twig', [
//                'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
//            ]);
//        }
//
//    }
//
//    /**
//     * @Route("/menu", name="menu")
//     *
//     */
//    public function menuAction(Request $request)
//    {
//        return $this->render('menu.html.twig');
//    }

}