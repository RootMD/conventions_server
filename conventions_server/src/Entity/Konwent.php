<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KonwentRepository")
 */
class Konwent implements \JsonSerializable
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
     * @ORM\Column(type="string", length=255)
     */
    private $miasto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lokalizacja;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Plan", mappedBy="konwent", orphanRemoval=true)
     */
    private $plans;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Konkurs", mappedBy="konwent", orphanRemoval=true)
     */
    private $konkursy;

    public function __construct()
    {
        $this->plans = new ArrayCollection();
        $this->konkursy = new ArrayCollection();
    }

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

    public function getMiasto(): ?string
    {
        return $this->miasto;
    }

    public function setMiasto(string $miasto): self
    {
        $this->miasto = $miasto;

        return $this;
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
     * @return Collection|Plan[]
     */
    public function getPlans(): Collection
    {
        return $this->plans;
    }

    public function addPlan(Plan $plan): self
    {
        if (!$this->plans->contains($plan)) {
            $this->plans[] = $plan;
            $plan->setKonwent($this);
        }

        return $this;
    }

    public function removePlan(Plan $plan): self
    {
        if ($this->plans->contains($plan)) {
            $this->plans->removeElement($plan);
            // set the owning side to null (unless already changed)
            if ($plan->getKonwent() === $this) {
                $plan->setKonwent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Konkurs[]
     */
    public function getKonkursy(): Collection
    {
        return $this->konkursy;
    }

    public function addKonkursy(Konkurs $konkursy): self
    {
        if (!$this->konkursy->contains($konkursy)) {
            $this->konkursy[] = $konkursy;
            $konkursy->setKonwent($this);
        }

        return $this;
    }

    public function removeKonkursy(Konkurs $konkursy): self
    {
        if ($this->konkursy->contains($konkursy)) {
            $this->konkursy->removeElement($konkursy);
            // set the owning side to null (unless already changed)
            if ($konkursy->getKonwent() === $this) {
                $konkursy->setKonwent(null);
            }
        }

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id'           => $this->id,
            'nazwa'        => $this->nazwa,
            'miasto'       => $this->miasto,
            'lokalizacja'  => $this->lokalizacja,
            'data'         => $this->data,
            'konkursy'     => $this->konkursy,
            'plan'         => $this->plans,
        ];
    }


}
