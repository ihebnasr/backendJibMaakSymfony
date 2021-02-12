<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * ArticleCommande
 *
 * @ORM\Table(name="article_commande", indexes={@ORM\Index(name="idart", columns={"idart"}), @ORM\Index(name="idcmd", columns={"idcmd"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ArticlecommandeRepository")
 * @ApiResource()
 */
class ArticleCommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idartcmd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idartcmd;

    /**
     * @var int
     *
     * @ORM\Column(name="Qte_art", type="integer", nullable=false)
     */
    private $qteArt;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix_u_art", type="decimal", precision=10, scale=3, nullable=false)
     */
    private $prixUArt;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_total_art", type="decimal", precision=10, scale=3, nullable=false)
     */
    private $prixTotalArt;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcmd", referencedColumnName="idcmd")
     * })
     */
    private $idcmd;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idart", referencedColumnName="idart")
     * })
     */
    private $idart;

    public function getIdartcmd(): ?int
    {
        return $this->idartcmd;
    }

    public function getQteArt(): ?int
    {
        return $this->qteArt;
    }

    public function setQteArt(int $qteArt): self
    {
        $this->qteArt = $qteArt;

        return $this;
    }

    public function getPrixUArt(): ?string
    {
        return $this->prixUArt;
    }

    public function setPrixUArt(string $prixUArt): self
    {
        $this->prixUArt = $prixUArt;

        return $this;
    }

    public function getPrixTotalArt(): ?string
    {
        return $this->prixTotalArt;
    }

    public function setPrixTotalArt(string $prixTotalArt): self
    {
        $this->prixTotalArt = $prixTotalArt;

        return $this;
    }

    public function getIdcmd()
    {
        return $this->idcmd;
    }

    public function setIdcmd(?Commande $idcmd): self
    {
        $this->idcmd = $idcmd;

        return $this;
    }

    public function getIdart()
    {
        return $this->idart;
    }

    public function setIdart(?Article $idart): self
    {
        $this->idart = $idart;

        return $this;
    }


}
