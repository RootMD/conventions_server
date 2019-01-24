<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StoiskoRepository")
 */
class Stoisko implements \JsonSerializable
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
    private $lokalizacja;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produkt", mappedBy="stoisko", orphanRemoval=true)
     */
    private $produkts;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Zespol", mappedBy="stoisko", cascade={"persist", "remove"})
     */
    private $zespol;

    public function __construct()
    {
        $this->produkts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLokalizacja(): ?string
    {
        return $this->lokalizacja;
    }

    public function setLokalizacja(string $lokalizacja): self
    {
        $this->lokalizacja = $lokalizacja;

        return $this;
    }

    /**
     * @return Collection|Produkt[]
     */
    public function getProdukts(): Collection
    {
        return $this->produkts;
    }

    public function addProdukt(Produkt $produkt): self
    {
        if (!$this->produkts->contains($produkt)) {
            $this->produkts[] = $produkt;
            $produkt->setStoisko($this);
        }

        return $this;
    }

    public function removeProdukt(Produkt $produkt): self
    {
        if ($this->produkts->contains($produkt)) {
            $this->produkts->removeElement($produkt);
            // set the owning side to null (unless already changed)
            if ($produkt->getStoisko() === $this) {
                $produkt->setStoisko(null);
            }
        }

        return $this;
    }

    public function getZespol(): ?Zespol
    {
        return $this->zespol;
    }

    public function setZespol(?Zespol $zespol): self
    {
        $this->zespol = $zespol;

        // set (or unset) the owning side of the relation if necessary
        $newStoisko = $zespol === null ? null : $this;
        if ($newStoisko !== $zespol->getStoisko()) {
            $zespol->setStoisko($newStoisko);
        }

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id'           => $this->id,
            'lokalizacja'        => $this->lokalizacja,
            'produkty'         => $this->produkts,
        ];
    }
}
