<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UczestnikRepository")
 */
class Uczestnik implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Konkurs", inversedBy="uczestnicy")
     * @ORM\JoinColumn(nullable=false)
     */
    private $konkurs;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bilet", inversedBy="uczestnik", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $bilet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwisko;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nick;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKonkurs(): ?konkurs
    {
        return $this->konkurs;
    }

    public function setKonkurs(?konkurs $konkurs): self
    {
        $this->konkurs = $konkurs;

        return $this;
    }

    public function getBilet(): ?bilet
    {
        return $this->bilet;
    }

    public function setBilet(bilet $bilet): self
    {
        $this->bilet = $bilet;

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

    public function getNick(): ?string
    {
        return $this->nick;
    }

    public function setNick(?string $nick): self
    {
        $this->nick = $nick;

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id'           => $this->id,
            'imie'        => $this->imie,
            'nazwisko'         => $this->nazwisko,
            'nick'         => $this->nick,
            'bilet'         => $this->bilet,
        ];
    }
}
