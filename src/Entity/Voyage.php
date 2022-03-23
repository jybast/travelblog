<?php

namespace App\Entity;

use App\Repository\VoyageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\SluggerInterface;

#[ORM\Entity(repositoryClass: VoyageRepository::class)]
class Voyage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    #[ORM\Column(type: 'date_immutable')]
    private $creerAt;

    #[ORM\Column(type: 'date_immutable', nullable: true)]
    private $projeterAt;

    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSlug(): ?string
    {
        return strtolower($this->slugger->slug($this->getTitre()));
    }

    public function setSlug(string $slug): self
    {
        $this->slug = strtolower($this->slugger->slug($slug));

        return $this;
    }

    public function getCreerAt(): ?\DateTimeImmutable
    {
        return $this->creerAt;
    }

    public function setCreerAt(\DateTimeImmutable $creerAt): self
    {
        $this->creerAt = $creerAt;

        return $this;
    }

    public function getProjeterAt(): ?\DateTimeImmutable
    {
        return $this->projeterAt;
    }

    public function setProjeterAt(?\DateTimeImmutable $projeterAt): self
    {
        $this->projeterAt = $projeterAt;

        return $this;
    }
}
