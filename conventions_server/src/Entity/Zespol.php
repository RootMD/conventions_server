<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ZespolRepository")
 */
class Zespol implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CzlonekZespolu", mappedBy="zespol", orphanRemoval=true)
     */
    private $czlonkowieZespolu;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Plan", inversedBy="zespol", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $plan;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwa;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Stoisko", inversedBy="zespol", cascade={"persist", "remove"})
     */
    private $stoisko;

    public function __construct()
    {
        $this->czlonkowieZespolu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|CzlonekZespolu[]
     */
    public function getCzlonkowieZespolu(): Collection
    {
        return $this->czlonkowieZespolu;
    }

    public function addCzlonkowieZespolu(CzlonekZespolu $czlonkowieZespolu): self
    {
        if (!$this->czlonkowieZespolu->contains($czlonkowieZespolu)) {
            $this->czlonkowieZespolu[] = $czlonkowieZespolu;
            $czlonkowieZespolu->setZespol($this);
        }

        return $this;
    }

    public function removeCzlonkowieZespolu(CzlonekZespolu $czlonkowieZespolu): self
    {
        if ($this->czlonkowieZespolu->contains($czlonkowieZespolu)) {
            $this->czlonkowieZespolu->removeElement($czlonkowieZespolu);
            // set the owning side to null (unless already changed)
            if ($czlonkowieZespolu->getZespol() === $this) {
                $czlonkowieZespolu->setZespol(null);
            }
        }

        return $this;
    }

    public function getPlan(): ?plan
    {
        return $this->plan;
    }

    public function setPlan(plan $plan): self
    {
        $this->plan = $plan;

        return $this;
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
            'nazwa'         => $this->nazwa,
            'czlonkowie'        => $this->czlonkowieZespolu,
            'stoisko'         => $this->stoisko,
        ];
    }
}
