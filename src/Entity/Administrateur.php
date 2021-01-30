<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Administrateur
 *
 * @ORM\Table(name="administrateur")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AdministrateurRepository")
 * @ApiResource()
 */
class Administrateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAdmin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadmin;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_admin", type="string", length=50, nullable=false)
     */
    private $nomAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom_admin", type="string", length=50, nullable=false)
     */
    private $prenomAdmin;

    /**
     * @var int
     *
     * @ORM\Column(name="tel_Admin", type="integer", nullable=false)
     */
    private $telAdmin;

    public function getIdadmin(): ?int
    {
        return $this->idadmin;
    }

    public function getNomAdmin(): ?string
    {
        return $this->nomAdmin;
    }

    public function setNomAdmin(string $nomAdmin): self
    {
        $this->nomAdmin = $nomAdmin;

        return $this;
    }

    public function getPrenomAdmin(): ?string
    {
        return $this->prenomAdmin;
    }

    public function setPrenomAdmin(string $prenomAdmin): self
    {
        $this->prenomAdmin = $prenomAdmin;

        return $this;
    }

    public function getTelAdmin(): ?int
    {
        return $this->telAdmin;
    }

    public function setTelAdmin(int $telAdmin): self
    {
        $this->telAdmin = $telAdmin;

        return $this;
    }


}
