<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="idclient", columns={"idclient"}), @ORM\Index(name="idliv", columns={"idliv"}), @ORM\Index(name="idAdmin", columns={"idAdmin"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\utilisateurRepository")
 * @ApiResource()
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="Idutilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idutilisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="login", type="integer", nullable=false)
     */
    private $login;

    /**
     * @var int
     *
     * @ORM\Column(name="mot_de_passe", type="integer", nullable=false)
     */
    private $motDePasse;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=false)
     */
    private $role;

    /**
     * @var \Administrateur
     *
     * @ORM\ManyToOne(targetEntity="Administrateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAdmin", referencedColumnName="idAdmin")
     * })
     */
    private $idadmin;

    /**
     * @var \Livreur
     *
     * @ORM\ManyToOne(targetEntity="Livreur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idliv", referencedColumnName="IdLivreur")
     * })
     */
    private $idliv;

    /**
     * @var \Clients
     *
     * @ORM\ManyToOne(targetEntity="Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idclient", referencedColumnName="idclient")
     * })
     */
    private $idclient;

    public function getIdutilisateur(): ?int
    {
        return $this->idutilisateur;
    }

    public function getLogin(): ?int
    {
        return $this->login;
    }

    public function setLogin(int $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMotDePasse(): ?int
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(int $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getIdadmin()
    {
        return $this->idadmin;
    }

    public function setIdadmin(?Administrateur $idadmin): self
    {
        $this->idadmin = $idadmin;

        return $this;
    }

    public function getIdliv()
    {
        return $this->idliv;
    }

    public function setIdliv(?Livreur $idliv): self
    {
        $this->idliv = $idliv;

        return $this;
    }

    public function getIdclient()
    {
        return $this->idclient;
    }

    public function setIdclient(?Clients $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }


}
