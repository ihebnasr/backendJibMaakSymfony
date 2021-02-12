<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Clients
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\clientsRepository")
 * @ApiResource()
 */
class Clients
{
    /**
     * @var int
     *
     * @ORM\Column(name="idclient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclient;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=50, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=false)
     */
    private $adresse;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var int
     *
     * @ORM\Column(name="tel1", type="integer", nullable=false)
     */
    private $tel1;

    /**
     * @var string
     *
     * @ORM\Column(name="profile1", type="string", length=50, nullable=false)
     */
    private $profile1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tel2", type="integer", nullable=true)
     */
    private $tel2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profile2", type="string", length=50, nullable=true)
     */
    private $profile2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tel3", type="integer", nullable=true)
     */
    private $tel3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profile3", type="string", length=50, nullable=true)
     */
    private $profile3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo", type="string", length=500, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=1, nullable=false)
     */
    private $sexe;

    public function getIdclient(): ?int
    {
        return $this->idclient;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getTel1(): ?int
    {
        return $this->tel1;
    }

    public function setTel1(int $tel1): self
    {
        $this->tel1 = $tel1;

        return $this;
    }

    public function getProfile1(): ?string
    {
        return $this->profile1;
    }

    public function setProfile1(string $profile1): self
    {
        $this->profile1 = $profile1;

        return $this;
    }

    public function getTel2(): ?int
    {
        return $this->tel2;
    }

    public function setTel2(?int $tel2): self
    {
        $this->tel2 = $tel2;

        return $this;
    }

    public function getProfile2(): ?string
    {
        return $this->profile2;
    }

    public function setProfile2(?string $profile2): self
    {
        $this->profile2 = $profile2;

        return $this;
    }

    public function getTel3(): ?int
    {
        return $this->tel3;
    }

    public function setTel3(?int $tel3): self
    {
        $this->tel3 = $tel3;

        return $this;
    }

    public function getProfile3(): ?string
    {
        return $this->profile3;
    }

    public function setProfile3(?string $profile3): self
    {
        $this->profile3 = $profile3;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }


}
