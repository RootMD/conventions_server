<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BiletRepository")
 */
class Bilet implements \JsonSerializable
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
     * @ORM\Column(type="integer")
     */
    private $cena;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Uczestnik", mappedBy="bilet", cascade={"persist", "remove"})
     */
    private $uczestnik;

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

    public function getCena(): ?int
    {
        return $this->cena;
    }

    public function setCena(int $cena): self
    {
        $this->cena = $cena;

        return $this;
    }

    public function getUczestnik(): ?Uczestnik
    {
        return $this->uczestnik;
    }

    public function setUczestnik(Uczestnik $uczestnik): self
    {
        $this->uczestnik = $uczestnik;

        // set the owning side of the relation if necessary
        if ($this !== $uczestnik->getBilet()) {
            $uczestnik->setBilet($this);
        }

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id'           => $this->id,
            'nazwa'        => $this->nazwa,
            'cena'         => $this->cena,
        ];
    }
}
