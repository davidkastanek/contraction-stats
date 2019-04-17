<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Contraction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endTime;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param \DateTimeInterface $startTime
     * @return Contraction
     */
    public function setStartTime(\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStartTime(): \DateTimeInterface
    {
        return $this->startTime;
    }

    /**
     * @param \DateTimeInterface $endTime
     * @return Contraction
     */
    public function setEndTime(\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }
}
