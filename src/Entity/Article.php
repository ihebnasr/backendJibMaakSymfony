<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="code_cate", columns={"code_cate"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @ApiResource(
 *     collectionOperations={
 *          "get",
 *          "post"={"security"="is_granted(’ROLE_ADMIN’)"}
 *     },
 *     itemOperations={
 *          "get",
 *          "put"={"security"="is_granted(’ROLE_ADMIN’)"},
 *          "delete"={"security"="is_granted(’ROLE_ADMIN’)"}
 *     },
 *    
 * )

 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="idart", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("post:read")
     */
    private $idart;

    /**
     * @var string
     *
     * @ORM\Column(name="designation_art", type="string", length=50, nullable=false)
     * @Groups("post:read")
     */
    private $designationArt;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_art", type="decimal", precision=10, scale=3, nullable=false)
     * @Groups("post:read")
     */
    private $prixArt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_cration", type="datetime", nullable=false)
     * @Groups("post:read")
     */
    private $dateCration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modif_art", type="datetime", nullable=false)
     * @Groups("post:read")
     */
    private $dateModifArt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="actif", type="integer", nullable=true)
     * @Groups("post:read")
     */
    private $actif;

    /**
     * @var int|null
     *
     * @ORM\Column(name="image", type="integer", nullable=true)
     * @Groups("post:read")
     */
    private $image;

    /**
     * @var int|null
     *
     * @ORM\Column(name="prix_promo_art", type="integer", nullable=true)
     * @Groups("post:read")
     */
    private $prixPromoArt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="en_promo", type="integer", nullable=true)
     * @Groups("post:read")
     */
    private $enPromo;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="code_cate", referencedColumnName="code_cate")
     * })
     * @Groups("post:read")
     */
    private $codeCate;

    public function getIdart(): ?int
    {
        return $this->idart;
    }

    public function getDesignationArt(): ?string
    {
        return $this->designationArt;
    }

    public function setDesignationArt(string $designationArt): self
    {
        $this->designationArt = $designationArt;

        return $this;
    }

    public function getPrixArt(): ?string
    {
        return $this->prixArt;
    }

    public function setPrixArt(string $prixArt): self
    {
        $this->prixArt = $prixArt;

        return $this;
    }

    public function getDateCration(): ?\DateTimeInterface
    {
        return $this->dateCration;
    }

    public function setDateCration(\DateTimeInterface $dateCration): self
    {
        $this->dateCration = $dateCration;

        return $this;
    }

    public function getDateModifArt(): ?\DateTimeInterface
    {
        return $this->dateModifArt;
    }

    public function setDateModifArt(\DateTimeInterface $dateModifArt): self
    {
        $this->dateModifArt = $dateModifArt;

        return $this;
    }

    public function getActif(): ?int
    {
        return $this->actif;
    }

    public function setActif(?int $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getImage(): ?int
    {
        return $this->image;
    }

    public function setImage(?int $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrixPromoArt(): ?int
    {
        return $this->prixPromoArt;
    }

    public function setPrixPromoArt(?int $prixPromoArt): self
    {
        $this->prixPromoArt = $prixPromoArt;

        return $this;
    }

    public function getEnPromo(): ?int
    {
        return $this->enPromo;
    }

    public function setEnPromo(?int $enPromo): self
    {
        $this->enPromo = $enPromo;

        return $this;
    }

    public function getCodeCate()
    {
        return $this->codeCate;
    }

    public function setCodeCate(?Categories $codeCate): self
    {
        $this->codeCate = $codeCate;

        return $this;
    }


}
