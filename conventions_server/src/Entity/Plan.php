<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanRepository")
 */
class Plan implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Konwent", inversedBy="plans")
     * @ORM\JoinColumn(nullable=false)
     */
    private $konwent;

    /**
     * @ORM\Column(type="time")
     */
    private $czas_rozpoczecia;

    /**
     * @ORM\Column(type="time")
     */
    private $czas_zakonczenia;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Zespol", mappedBy="plan", cascade={"persist", "remove"})
     */
    private $zespol;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKonwent(): ?Konwent
    {
        return $this->konwent;
    }

    public function setKonwent(?Konwent $konwent): self
    {
        $this->konwent = $konwent;

        return $this;
    }

    public function getCzasRozpoczecia(): ?\DateTimeInterface
    {
        return $this->czas_rozpoczecia;
    }

    public function setCzasRozpoczecia(\DateTimeInterface $czas_rozpoczecia): self
    {
        $this->czas_rozpoczecia = $czas_rozpoczecia;

        return $this;
    }

    public function getCzasZakonczenia(): ?\DateTimeInterface
    {
        return $this->czas_zakonczenia;
    }

    public function setCzasZakonczenia(\DateTimeInterface $czas_zakonczenia): self
    {
        $this->czas_zakonczenia = $czas_zakonczenia;

        return $this;
    }

    public function getZespol(): ?Zespol
    {
        return $this->zespol;
    }

    public function setZespol(Zespol $zespol): self
    {
        $this->zespol = $zespol;

        // set the owning side of the relation if necessary
        if ($this !== $zespol->getPlan()) {
            $zespol->setPlan($this);
        }

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'zespol'           => $this->zespol,
            'czas_rozpoczecia'        => $this->czas_rozpoczecia,
            'czas_zakonczenia'         => $this->czas_zakonczenia,
        ];
    }


}
