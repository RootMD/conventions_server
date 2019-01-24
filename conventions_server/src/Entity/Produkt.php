<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduktRepository")
 */
class Produkt implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwa;

    /**
     * @ORM\Column(type="float")
     */
    private $cena;

    /**
     * @ORM\Column(type="integer")
     */
    private $ilosc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stoisko", inversedBy="produkts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stoisko;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    public function getCena(): ?float
    {
        return $this->cena;
    }

    public function setCena(float $cena): self
    {
        $this->cena = $cena;

        return $this;
    }

    public function getIlosc(): ?int
    {
        return $this->ilosc;
    }

    public function setIlosc(int $ilosc): self
    {
        $this->ilosc = $ilosc;

        return $this;
    }

    public function getStoisko(): ?stoisko
    {
        return $this->stoisko;
    }

    public function setStoisko(?stoisko $stoisko): self
    {
        $this->stoisko = $stoisko;

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id'           => $this->id,
            'nazwa'        => $this->nazwa,
            'cena'         => $this->cena,
            'ilosc'         => $this->ilosc,
        ];
    }
}
