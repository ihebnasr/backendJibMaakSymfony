<?php

namespace App\Entity;

use Webmozart\Assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="code_cate", columns={"code_cate"})})
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @ApiResource(
 *     collectionOperations={
 *          "get",
 *          "post"
 *     },
 *     itemOperations={
 *          "get",
 *          "put",
 *           "patch",
 *          "delete"={"security"="is_granted('ROLE_ADMIN')"}
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
     * @var float
     *
     * @ORM\Column(name="prix_art", type="float", precision=10, scale=3, nullable=true)
     * @Groups("post:read")  
     */
    private $prixArt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", nullable=true)
     * @Groups("post:read")
     */
    private $image;

  
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

    public function setPrixArt(float $prixArt): self
    {
        $this->prixArt = $prixArt;

        return $this;
    }

    
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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
