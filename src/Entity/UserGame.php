<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserGameRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserGameRepository::class)]
#[ApiFilter(SearchFilter::class, properties: [
    'user.id' => 'exact',
    'game.id' => 'exact',
])]
#[ApiResource(
    normalizationContext: ['groups' => ['usergame:read']]
)]
class UserGame
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['game:read', 'usergame:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[Groups(['game:read', 'usergame:read'])]
    private ?User $user = null;

    #[ORM\ManyToOne]
    #[Groups(['game:read','usergame:read'])]
    private ?Game $game = null;

    #[ORM\Column]
    #[Groups(['game:read', 'usergame:read'])]
    private ?int $score = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): static
    {
        $this->game = $game;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): static
    {
        $this->score = $score;

        return $this;
    }
}
