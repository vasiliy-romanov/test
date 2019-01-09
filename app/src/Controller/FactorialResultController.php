<?php
/**
 * Created by PhpStorm.
 * User: vasily
 * Date: 27.12.18
 * Time: 16:17
 */

namespace App\Controller;


use App\Entity\FactorialResult;
use OldSound\RabbitMqBundle\RabbitMq\Producer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

class FactorialResultController extends AbstractController
{
    public function show(UserInterface $user, Request $request, Producer $producer)
    {
        $number = (int) $request->query->get('number');

        if (is_int($number) && $number <> 0) {
            $manager = $this->getDoctrine()->getManager();

            $rezult = new FactorialResult();
            $rezult->setUserId($user);
            $rezult->setNumberFactorial($number);
            $rezult->setRezult(1);

//        var_dump($rezult);

            $manager->persist($rezult);
            $manager->flush();


            $massage = [
                'id' => $rezult->getId(),
                'number' => $number
            ];

//            var_dump($massage);

            $rabbitMassage = json_encode($massage);

//            $this->get('old_sound_rabbit_mq.number_producer')->setContextType('application/json');
//            $this->get('old_sound_rabbit_mq.number_producer')->publish($rabbitMassage);
            $producer->publish($rabbitMassage);
        }

        return $this->render('factorial/calculate.html.twig');
    }
}