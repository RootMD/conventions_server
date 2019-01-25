<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KonkursRepository")
 */
class Konkurs implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Konwent", inversedBy="konkursy")
     * @ORM\JoinColumn(nullable=false)
     */
    private $konwent;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Gra", inversedBy="konkursy", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $gra;

    /**
     * @ORM\Column(type="integer")
     */
    private $nagroda;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Uczestnik", mappedBy="konkurs", orphanRemoval=true)
     */
    private $uczestnicy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwa;

    public function __construct()
    {
        $this->uczestnicy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKonwent(): ?konwent
    {
        return $this->konwent;
    }

    public function setKonwent(?konwent $konwent): self
    {
        $this->konwent = $konwent;

        return $this;
    }

    public function getGra(): ?gra
    {
        return $this->gra;
    }

    public function setGra(gra $gra): self
    {
        $this->gra = $gra;

        return $this;
    }

    public function getNagroda(): ?int
    {
        return $this->nagroda;
    }

    public function setNagroda(int $nagroda): self
    {
        $this->nagroda = $nagroda;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return Collection|Uczestnik[]
     */
    public function getUczestnicy(): Collection
    {
        return $this->uczestnicy;
    }

    public function addUczestnicy(Uczestnik $uczestnicy): self
    {
        if (!$this->uczestnicy->contains($uczestnicy)) {
            $this->uczestnicy[] = $uczestnicy;
            $uczestnicy->setKonkurs($this);
        }

        return $this;
    }

    public function removeUczestnicy(Uczestnik $uczestnicy): self
    {
        if ($this->uczestnicy->contains($uczestnicy)) {
            $this->uczestnicy->removeElement($uczestnicy);
            // set the owning side to null (unless already changed)
            if ($uczestnicy->getKonkurs() === $this) {
                $uczestnicy->setKonkurs(null);
            }
        }

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id'           => $this->id,
            'gra'        => $this->gra,
            'nagroda'         => $this->nagroda,
            'data'         => $this->data,
            'uczestnicy'         => $this->uczestnicy,
        ];
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
}
