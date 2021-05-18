<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 *
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $name;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $beginSeason;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $endSeason;

    /**
     * @ORM\OneToMany(targetEntity=ListIngrdients::class, mappedBy="idIngredient", orphanRemoval=true)
     */
    private $listIngrdients;

    public function __construct()
    {
        $this->listIngrdients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBeginSeason(): ?\DateTimeInterface
    {
        return $this->beginSeason;
    }

    public function setBeginSeason(?\DateTimeInterface $beginSeason): self
    {
        $this->beginSeason = $beginSeason;

        return $this;
    }

    public function getEndSeason(): ?\DateTimeInterface
    {
        return $this->endSeason;
    }

    public function setEndSeason(?\DateTimeInterface $endSeason): self
    {
        $this->endSeason = $endSeason;

        return $this;
    }

    /**
     * @return Collection|ListIngrdients[]
     */
    public function getListIngrdients(): Collection
    {
        return $this->listIngrdients;
    }

    public function addListIngrdient(ListIngrdients $listIngrdient): self
    {
        if (!$this->listIngrdients->contains($listIngrdient)) {
            $this->listIngrdients[] = $listIngrdient;
            $listIngrdient->setIdIngredient($this);
        }

        return $this;
    }

    public function removeListIngrdient(ListIngrdients $listIngrdient): self
    {
        if ($this->listIngrdients->removeElement($listIngrdient)) {
            // set the owning side to null (unless already changed)
            if ($listIngrdient->getIdIngredient() === $this) {
                $listIngrdient->setIdIngredient(null);
            }
        }

        return $this;
    }
}
