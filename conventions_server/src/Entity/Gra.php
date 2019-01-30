<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GraRepository")
 */
class Gra implements \JsonSerializable
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
     * @ORM\OneToOne(targetEntity="App\Entity\Konkurs", mappedBy="gra", cascade={"persist", "remove"})
     */
    private $konkursy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

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

    public function getKonkursy(): ?Konkurs
    {
        return $this->konkursy;
    }

    public function setKonkursy(Konkurs $konkursy): self
    {
        $this->konkursy = $konkursy;

        // set the owning side of the relation if necessary
        if ($this !== $konkursy->getGra()) {
            $konkursy->setGra($this);
        }

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id'           => $this->id,
            'nazwa'        => $this->nazwa,
            'image'        => $this->image,
        ];
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
