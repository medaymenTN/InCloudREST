<?php

namespace App\Controller\Rest;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends FOSRestController
{
    /**
     * Create a user resource
     * @Rest\Post("/user")
     * @return View
     */
    public function Register(Request $request):View
    {
         /**@var EntityManager $em  **/
        $em = $this->getDoctrine()->getManager();
        $response = null ;
        //check if the username already exist
        $user = $em->getRepository('App:User')->findBy(array("username"=>$request->get('username')));
        if($user){
            $response = new View("user already exist",Response::HTTP_CONFLICT);
        }else {
            // creating new user
          $newUser = new User();
          $newUser->setUsername($request->get('username'));
          $em->persist($newUser);
          $em->flush();
        $response = new View($newUser,Response::HTTP_ACCEPTED);
        }
            return $response;
    }




}
