<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 * @ApiResource( )
 */
class Categories
{
    /**
     * @var int
     *
     * @ORM\Column(name="code_cate", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("post:read")
     */
    private $codeCate;

    /**
     * @var string
     *
     * @ORM\Column(name="designatio_cate", type="string", length=50, nullable=false)
     * @Groups("post:read")
     */
    private $designatioCate;
     /**
     * @var string
     *
     * @ORM\Column(name="image_cate", type="string", length=500, nullable=false)
     * @Groups("post:read")
     */
    private $imageCate;

    public function getCodeCate(): ?int
    {
        return $this->codeCate;
    }

    public function getDesignatioCate(): ?string
    {
        return $this->designatioCate;
    }

    public function setDesignatioCate(string $designatioCate): self
    {
        $this->designatioCate = $designatioCate;

        return $this;
    }



    /**
     * Get the value of imageCate
     *
     * @return  string
     */ 
    public function getImageCate()
    {
        return $this->imageCate;
    }

    /**
     * Set the value of imageCate
     *
     * @param  string  $imageCate
     *
     * @return  self
     */ 
    public function setImageCate(string $imageCate)
    {
        $this->imageCate = $imageCate;

        return $this;
    }
}
