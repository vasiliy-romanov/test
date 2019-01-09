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

    public function execute(AMQPMessage $msg)
    {
        $body = $msg->body;
        $response = json_decode($body, true);
        $result = $this->manager->find(FactorialResult::class, $response['id']);

//        var_dump($this->repository);

        $number = $response['number'];

        for ($i = 1; $i <= $number; ++$i){
            $i *= $i;
//          var_dump($i);
        }


//      var_dump($i);

        $result->setRezult($i);

//      var_dump($result);

        $this->manager->persist($result);
        $this->manager->flush();
    }
}