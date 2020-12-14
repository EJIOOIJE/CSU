<?php

namespace App\Entity;

use App\Repository\RightRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RightRepository::class)
 * @ORM\Table(name="`right`")
 */
class Right
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rights;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $document;

    /**
     * @ORM\Column(type="json")
     */
    private $olympiads = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $informed;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Update_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRights(): ?string
    {
        return $this->rights;
    }

    public function setRights(string $rights): self
    {
        $this->rights = $rights;

        return $this;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(?string $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getOlympiads(): ?array
    {
        return $this->olympiads;
    }

    public function setOlympiads(array $olympiads): self
    {
        $this->olympiads = $olympiads;

        return $this;
    }

    public function getInformed(): ?bool
    {
        return $this->informed;
    }

    public function setInformed(bool $informed): self
    {
        $this->informed = $informed;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeInterface $create_at): self
    {
        $this->create_at = $create_at;

        return $this;
    }

    public function setCreateAtValue()
    {
        $this->create_at = new \DateTime();
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->Update_at;
    }

    public function setUpdateAt(\DateTimeInterface $Update_at): self
    {
        $this->Update_at = $Update_at;

        return $this;
    }

    public function setUpdateAtValue()
    {
        $this->update_at = new \DateTime();
    }
}
