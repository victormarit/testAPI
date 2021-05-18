<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
class Recipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1500)
     */
    private $instruction;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $difficulty;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="recipes")
     */
    private $idCategory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="idRecipe")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=ListIngrdients::class, mappedBy="idRecipe", orphanRemoval=true)
     */
    private $listIngrdients;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->listIngrdients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    public function setInstruction(string $instruction): self
    {
        $this->instruction = $instruction;

        return $this;
    }

    public function getDifficulty(): ?float
    {
        return $this->difficulty;
    }

    public function setDifficulty(?float $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getIdCategory(): ?Category
    {
        return $this->idCategory;
    }

    public function setIdCategory(?Category $idCategory): self
    {
        $this->idCategory = $idCategory;

        return $this;
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

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setIdRecipe($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getIdRecipe() === $this) {
                $comment->setIdRecipe(null);
            }
        }

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
            $listIngrdient->setIdRecipe($this);
        }

        return $this;
    }

    public function removeListIngrdient(ListIngrdients $listIngrdient): self
    {
        if ($this->listIngrdients->removeElement($listIngrdient)) {
            // set the owning side to null (unless already changed)
            if ($listIngrdient->getIdRecipe() === $this) {
                $listIngrdient->setIdRecipe(null);
            }
        }

        return $this;
    }
}
