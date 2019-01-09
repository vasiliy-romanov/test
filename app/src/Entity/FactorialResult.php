<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactorialResultRepository")
 */
class FactorialResult
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\Column(type="bigint")
     */
    private $rezult;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberFactorial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getRezult(): ?int
    {
        return $this->rezult;
    }

    public function setRezult(int $rezult): self
    {
        $this->rezult = $rezult;

        return $this;
    }

    public function getNumberFactorial(): ?int
    {
        return $this->numberFactorial;
    }

    public function setNumberFactorial(int $numberFactorial): self
    {
        $this->numberFactorial = $numberFactorial;

        return $this;
    }
}
