<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $nom_cli;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="Client")
     */
    private $id_cli;

    public function __construct()
    {
        $this->id_cli = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCli(): ?string
    {
        return $this->nom_cli;
    }

    public function setNomCli(string $nom_cli): self
    {
        $this->nom_cli = $nom_cli;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|reservation[]
     */
    public function getIdCli(): Collection
    {
        return $this->id_cli;
    }

    public function addIdCli(reservation $idCli): self
    {
        if (!$this->id_cli->contains($idCli)) {
            $this->id_cli[] = $idCli;
            $idCli->setClient($this);
        }

        return $this;
    }

    public function removeIdCli(reservation $idCli): self
    {
        if ($this->id_cli->contains($idCli)) {
            $this->id_cli->removeElement($idCli);
            // set the owning side to null (unless already changed)
            if ($idCli->getClient() === $this) {
                $idCli->setClient(null);
            }
        }

        return $this;
    }
    public function __toString()
    {

        return (string) $this->nom;

    }
}
