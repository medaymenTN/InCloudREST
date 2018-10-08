<?php
/**
 * Created by PhpStorm.
 * User: Aymen
 * Date: 10/8/2018
 * Time: 2:48 PM
 */

namespace App\DataFixtures;


use App\Entity\Tracker;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class TimeFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        // calling php library faker to generate random fake data
        $faker = Faker\Factory::create();

        // create 2 users and
        $user = new User();
        $user->setUsername($faker->name);


        //persist the objects in the database

        $manager->persist($user);
        $manager->flush();

        // create 10 times objects
        for ($i = 0; $i < 10; $i++) {
            $timeTracker = new Tracker();
            $timeTracker->setTime($faker->dateTime);
            $timeTracker->setDescription($faker->text);
            $timeTracker->setUser($user);
            $manager->persist($timeTracker);


        }
        $manager->flush();
    }
}