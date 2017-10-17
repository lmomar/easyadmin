<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 17/10/2017
 * Time: 14:18
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationPharmacienController extends Controller
{

    /**
     * @Route(name="register_pharmacien")
     */
    public function registerAction(){
        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register('AppBundle\Entity\Pharmacien')
            ;
    }

}