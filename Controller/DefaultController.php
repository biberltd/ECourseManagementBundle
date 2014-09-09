<?php

namespace BiberLtd\Bundle\ECourseManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BiberLtdECourseManagementBundle:Default:index.html.twig', array('name' => $name));
    }
}
