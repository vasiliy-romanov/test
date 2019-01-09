<?php
/**
 * Created by PhpStorm.
 * User: vasily
 * Date: 20.12.18
 * Time: 14:56
 */

namespace App\Rabbit;


use App\Entity\FactorialResult;
use Doctrine\Common\Persistence\ObjectManager;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class NumberService implements ConsumerInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param AMQPMessage $msg
     * @return mixed|void
     */
    public function execute(AMQPMessage $msg)
    {
        $body = $msg->body;
        $response = json_decode($body, true);
        $result = $this->manager->find(FactorialResult::class, $response['id']);

//        var_dump($this->repository);

        $number = $response['number'];

//        var_dump($number);
        $rez = 1;


        for ($i = 2; $i <= $number; ++$i){
            $rez = bcmul($rez, $i);
//          var_dump($i);
        }


//        var_dump($rez);

        $result->setRezult($rez);

//      var_dump($result);

        $this->manager->persist($result);
        $this->manager->flush();
    }
}