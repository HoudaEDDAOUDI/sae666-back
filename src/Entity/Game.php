<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: GameRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['game:read']]
)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['user:read', 'game:read'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['user:read', 'game:read'])]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    #[Groups(['user:read', 'game:read'])]
    private ?int $nbr_player = null;

    #[ORM\Column]
    #[Groups(['user:read', 'game:read'])]
    private ?int $id_winner = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable {
        return $this->created_at;
    }
    public function setCreatedAt(\DateTimeImmutable $created_at): static {
        $this->created_at = $created_at; return $this;
    }

    public function getNbrPlayer(): ?int {
        return $this->nbr_player;
    }
    public function setNbrPlayer(int $nbr_player): static {
        $this->nbr_player = $nbr_player; return $this;
    }

    public function getIdWinner(): ?int {
        return $this->id_winner;
    }
    public function setIdWinner(int $id_winner): static {
        $this->id_winner = $id_winner; return $this;
    }
}
