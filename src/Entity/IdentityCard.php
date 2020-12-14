<?php

namespace App\Entity;

use App\Repository\IdentityCardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IdentityCardRepository::class)
 */
class IdentityCard
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
    private $document;

    /**
     * @ORM\Column(type="integer")
     */
    private $series;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="datetime")
     */
    private $issueDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dapartmentCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $issued;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $documentFile;

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
    private $update_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(string $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getSeries(): ?int
    {
        return $this->series;
    }

    public function setSeries(int $series): self
    {
        $this->series = $series;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    public function setIssueDate(\DateTimeInterface $issueDate): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    public function getDapartmentCode(): ?string
    {
        return $this->dapartmentCode;
    }

    public function setDapartmentCode(string $dapartmentCode): self
    {
        $this->dapartmentCode = $dapartmentCode;

        return $this;
    }

    public function getIssued(): ?string
    {
        return $this->issued;
    }

    public function setIssued(string $issued): self
    {
        $this->issued = $issued;

        return $this;
    }

    public function getDocumentFile(): ?string
    {
        return $this->documentFile;
    }

    public function setDocumentFile(?string $documentFile): self
    {
        $this->documentFile = $documentFile;

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
        return $this->update_at;
    }

    public function setUpdateAt(\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

        return $this;
    }

    public function setUpdateAtValue()
    {
        $this->update_at = new \DateTime();
    }
}
