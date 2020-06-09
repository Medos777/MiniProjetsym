<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
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
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="Service")
     */
    private $id_service;

    public function __construct()
    {
        $this->id_service = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|reservation[]
     */
    public function getIdService(): Collection
    {
        return $this->id_service;
    }

    public function addIdService(reservation $idService): self
    {
        if (!$this->id_service->contains($idService)) {
            $this->id_service[] = $idService;
            $idService->setService($this);
        }

        return $this;
    }

    public function removeIdService(reservation $idService): self
    {
        if ($this->id_service->contains($idService)) {
            $this->id_service->removeElement($idService);
            // set the owning side to null (unless already changed)
            if ($idService->getService() === $this) {
                $idService->setService(null);
            }
        }

        return $this;
    }
    public function __toString()
    {

        return (string) $this->libelle;

    }
}
