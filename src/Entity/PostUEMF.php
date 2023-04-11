<?php

namespace App\Entity;

use App\Repository\PostUEMFRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostUEMFRepository::class)]
class PostUEMF
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Author = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Content = null;
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $summary = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Image = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Update_at = null;

    #[ORM\OneToMany(mappedBy: 'PostUEMF', targetEntity: CommentUEMF::class)]
    private Collection $commentsUEMF;

   

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->commentsUEMF = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(?string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }
    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

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

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(?string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }
    public function getsummary(): ?string
    {
        return $this->summary;
    }

    public function setsummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->Created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $Created_at): self
    {
        $this->Created_at = $Created_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->Update_at;
    }

    public function setUpdateAt(?\DateTimeInterface $Update_at): self
    {
        $this->Update_at = $Update_at;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setPost($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getPost() === $this) {
                $comment->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CommentUEMF>
     */
    public function getCommentsUEMF(): Collection
    {
        return $this->commentsUEMF;
    }

    public function addCommentsUEMF(CommentUEMF $commentsUEMF): self
    {
        if (!$this->commentsUEMF->contains($commentsUEMF)) {
            $this->commentsUEMF->add($commentsUEMF);
            $commentsUEMF->setPostUEMF($this);
        }

        return $this;
    }

    public function removeCommentsUEMF(CommentUEMF $commentsUEMF): self
    {
        if ($this->commentsUEMF->removeElement($commentsUEMF)) {
            // set the owning side to null (unless already changed)
            if ($commentsUEMF->getPostUEMF() === $this) {
                $commentsUEMF->setPostUEMF(null);
            }
        }

        return $this;
    }
    
}
