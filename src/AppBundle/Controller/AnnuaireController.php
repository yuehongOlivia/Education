<?php
/**
 * Created by PhpStorm.
 * User: Mbape
 * Date: 21/02/2018
 * Time: 14:51
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
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
     * @Route("/annuaire/fiche", name="annuaire_fiche")
     * @Method({"GET"})
     */
    public function ficheAction(Request $request)
    {
        // Récupère paramètre de mon url
        $nom = $request->query->get('nom');

        $em = $this->getDoctrine()->getManager();

        // Cherche utilisateur grâce au nom
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('nom' => $nom)); // Renvoie un objet
        $userId = $user->getId();

        // Cherche etudiant grace à l'id user
        $etudiant = $em->getRepository('AppBundle:Etudiant')->find($userId);

        if ($user != null && $etudiant != null) {
            // retourne page fiche de l'annuaire
            return $this->render('annuaire/fiche.html.twig', array(
                'user' => $user,
                'etudiant' => $etudiant,
            ));
        } else {
            return $this->render('annuaire/recherche.html.twig');
        }
    }
}