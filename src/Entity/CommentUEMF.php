<?php

namespace App\Entity;

use App\Repository\CommentUEMFRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentUEMFRepository::class)]
class CommentUEMF
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Author = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'commentsUEMF')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PostUEMF $PostUEMF = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(?string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->Author;
    }

    public function setAuthor(?string $Author): self
    {
        $this->Author = $Author;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPostUEMF(): ?PostUEMF
    {
        return $this->PostUEMF;
    }

    public function setPostUEMF(?PostUEMF $PostUEMF): self
    {
        $this->PostUEMF = $PostUEMF;

        return $this;
    }
}
