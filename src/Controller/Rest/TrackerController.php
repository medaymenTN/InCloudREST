<?php
/**
 * Created by PhpStorm.
 * User: Aymen
 * Date: 01/10/2018
 * Time: 15:38
 */
namespace  App\Controller\Rest ;
use App\Entity\Tracker;
use Doctrine\ORM\EntityManager;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackerController extends  FOSRestController
{

    /**
     * Creates a tracker resource
     * @Rest\Post("/tracker")
     * @return View
     */
    public  function AddTrackerAction(Request $request):View{

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        // get All values from Http request Body using keys

        //convert string time to suitable time format equivalent to Doctrine TimeType
        $time = \DateTime::createFromFormat('H:i:s', $request->get('time'));
        $description = $request->get("description");
        // fetching user object from database using user primary key (Id())
        $user = $em->getRepository('App:User')->find($request->get('userId'));

        // creating instance of Tracker object
        $tracker = new Tracker();
        //setting all the attributes
        $tracker->setTime($time);
        $tracker->setDescription($description);
        $tracker->setUser($user);
        // save the object in the database
        $em->persist($tracker);
        $em->flush();

        return new View($tracker,Response::HTTP_CREATED);
    }
    /**
     * Fetching all trackers from database
     * @Rest\Get("/trackers")
     * @return View
     */
    public  function  getAllTrackersAction(Request $request):View{

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        // fetching all data from database
        $qb = $em->getRepository('App:Tracker')->findAll();

        //making pagination using knp_paginator and load 5 items for single pagintion
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($qb, $request->get('page', 1), 5);

        return new View($pagination,Response::HTTP_ACCEPTED);

    }

}
