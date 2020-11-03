<?php
    namespace App\Controller;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    use App\Model\Person;


    class DefaultController extends AbstractController
    {
        /**
        *@Route("/", methods={"GET", "POST"})
        */
        public function indexAction()
        {
            return $this->render('default/index.html.twig', [ 'message' => 'Hallo World'] );
        }
    }