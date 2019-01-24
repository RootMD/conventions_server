<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CzlonekZespoluRepository")
 */
class CzlonekZespolu implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Zespol", inversedBy="czlonkowieZespolu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $zespol;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stanowisko;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwisko;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZespol(): ?zespol
    {
        return $this->zespol;
    }

    public function setZespol(?zespol $zespol): self
    {
        $this->zespol = $zespol;

        return $this;
    }

    public function getStanowisko(): ?string
    {
        return $this->stanowisko;
    }

    public function setStanowisko(string $stanowisko): self
    {
        $this->stanowisko = $stanowisko;

        return $this;
    }

    public function getImie(): ?string
    {
        return $this->imie;
    }

    public function setImie(string $imie): self
    {
        $this->imie = $imie;

        return $this;
    }

    public function getNazwisko(): ?string
    {
        return $this->nazwisko;
    }

    public function setNazwisko(string $nazwisko): self
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id'           => $this->id,
            'imie'        => $this->imie,
            'nazwisko'         => $this->nazwisko,
            'stanowisko'         => $this->stanowisko,

        ];
    }
}
