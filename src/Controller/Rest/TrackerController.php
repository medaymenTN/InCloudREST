<?php
/**
 * Created by PhpStorm.
 * User: Aymen
 * Date: 01/10/2018
 * Time: 15:38
 */
namespace  App\Controller\Rest ;
use App\Entity\Timer;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackerController extends  FOSRestController
{

    /**
     * Creates a tracker resource
     * @Rest\Post("/test")
     * @return Response
     */
    public  function AddTracker(Request $request):Response{

        $em = $this->getDoctrine()->getManager();
        // get All values from Http request Body using keys



        $timeFromDateTime = new \DateTime("25/04/2015 15:00");
        $time = $timeFromDateTime->format("H:i:s");
        $description = $request->get("description");
        $user = $em->getRepository('App:User')->find($request->get('userId'));


        // creating instance of Timer object

        $tracker = new Timer();
        $tracker->setTime($time);
        $tracker->setDescription($description);
        $tracker->setUser($user);

        // save the object in the database

        $em->persist($tracker);
        $em->flush();

        return new Response($time,Response::HTTP_CREATED);
    }

}
