<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\OneToMany(targetEntity=Eleve::class, mappedBy="classe")
     */
    private $eleve;

    /**
     * @ORM\ManyToMany(targetEntity=Prof::class, inversedBy="classes")
     */
    private $prof;

    /**
     * @ORM\OneToOne(targetEntity=Prof::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $prof_principal;

    public function __construct()
    {
        $this->eleve = new ArrayCollection();
        $this->prof = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getEleve(): Collection
    {
        return $this->eleve;
    }

    public function addEleve(Eleve $eleve): self
    {
        if (!$this->eleve->contains($eleve)) {
            $this->eleve[] = $eleve;
            $eleve->setClasse($this);
        }

        return $this;
    }

    public function removeEleve(Eleve $eleve): self
    {
        if ($this->eleve->removeElement($eleve)) {
            // set the owning side to null (unless already changed)
            if ($eleve->getClasse() === $this) {
                $eleve->setClasse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prof>
     */
    public function getProf(): Collection
    {
        return $this->prof;
    }

    public function addProf(Prof $prof): self
    {
        if (!$this->prof->contains($prof)) {
            $this->prof[] = $prof;
        }

        return $this;
    }

    public function removeProf(Prof $prof): self
    {
        $this->prof->removeElement($prof);

        return $this;
    }

    public function getProfPrincipal(): ?Prof
    {
        return $this->prof_principal;
    }

    public function setProfPrincipal(Prof $prof_principal): self
    {
        $this->prof_principal = $prof_principal;

        return $this;
    }
}
