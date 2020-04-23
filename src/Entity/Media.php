<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 */
class Media
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="media")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoryName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="media")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?bool
    {
        return $this->type;
    }

    public function setType(bool $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getCategoryName(): ?Category
    {
        return $this->categoryName;
    }

    public function setCategoryName(?Category $categoryName): self
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    public function getProductName(): ?Product
    {
        return $this->productName;
    }

    public function setProductName(?Product $productName): self
    {
        $this->productName = $productName;

        return $this;
    }
    
}
