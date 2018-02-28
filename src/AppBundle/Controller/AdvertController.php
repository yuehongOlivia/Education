<?php
/**
 * Created by PhpStorm.
 * User: Mbape
 * Date: 28/02/2018
 * Time: 11:45
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdvertController extends Controller
{
    /**
     * @Security("has_role('ROLE_AUTEUR')")
     */
    public function addAction(Request $request)
    {
        // Plus besoin du if avec le security.context, l'annotation s'occupe de tout !
        // Dans cette méthode, vous êtes sûrs que l'utilisateur courant dispose du rôle ROLE_AUTEUR
    }
}