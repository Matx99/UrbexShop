<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandLineRepository")
 */
class CommandLine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="commandLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Orders", inversedBy="commandLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orderNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getProductName(): ?Product
    {
        return $this->productName;
    }

    public function setName(?Product $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getOrderNumber(): ?Orders
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(?Orders $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }
}
