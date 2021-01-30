<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="IdLiv", columns={"IdLiv"}), @ORM\Index(name="idclient", columns={"idclient"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\commandeRepository")
 * @ApiResource()
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcmd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcmd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_cmd", type="datetime", nullable=false)
     */
    private $dateCmd;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_total", type="decimal", precision=10, scale=3, nullable=false)
     */
    private $prixTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_cmd", type="string", length=50, nullable=false)
     */
    private $adresseCmd;

    /**
     * @var int
     *
     * @ORM\Column(name="etat_cmd", type="integer", nullable=false)
     */
    private $etatCmd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_prevue", type="datetime", nullable=false)
     */
    private $datePrevue;

    /**
     * @var string
     *
     * @ORM\Column(name="frais_liv", type="decimal", precision=5, scale=3, nullable=false)
     */
    private $fraisLiv;

    /**
     * @var \Livreur
     *
     * @ORM\ManyToOne(targetEntity="Livreur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdLiv", referencedColumnName="IdLivreur")
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

    public function getIdcmd(): ?int
    {
        return $this->idcmd;
    }

    public function getDateCmd(): ?\DateTimeInterface
    {
        return $this->dateCmd;
    }

    public function setDateCmd(\DateTimeInterface $dateCmd): self
    {
        $this->dateCmd = $dateCmd;

        return $this;
    }

    public function getPrixTotal(): ?string
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(string $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getAdresseCmd(): ?string
    {
        return $this->adresseCmd;
    }

    public function setAdresseCmd(string $adresseCmd): self
    {
        $this->adresseCmd = $adresseCmd;

        return $this;
    }

    public function getEtatCmd(): ?int
    {
        return $this->etatCmd;
    }

    public function setEtatCmd(int $etatCmd): self
    {
        $this->etatCmd = $etatCmd;

        return $this;
    }

    public function getDatePrevue(): ?\DateTimeInterface
    {
        return $this->datePrevue;
    }

    public function setDatePrevue(\DateTimeInterface $datePrevue): self
    {
        $this->datePrevue = $datePrevue;

        return $this;
    }

    public function getFraisLiv(): ?string
    {
        return $this->fraisLiv;
    }

    public function setFraisLiv(string $fraisLiv): self
    {
        $this->fraisLiv = $fraisLiv;

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
