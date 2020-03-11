<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TournamentRepository")
 */
class Tournament
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $inscription_ending_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_team;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Teams", inversedBy="tournaments")
     */
    private $teams;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getInscriptionEndingAt(): ?\DateTimeInterface
    {
        return $this->inscription_ending_at;
    }

    public function setInscriptionEndingAt(\DateTimeInterface $inscription_ending_at): self
    {
        $this->inscription_ending_at = $inscription_ending_at;

        return $this;
    }

    public function getMaxTeam(): ?int
    {
        return $this->max_team;
    }

    public function setMaxTeam(int $max_team): self
    {
        $this->max_team = $max_team;

        return $this;
    }

    /**
     * @return Collection|Teams[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Teams $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
        }

        return $this;
    }

    public function removeTeam(Teams $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
        }

        return $this;
    }
}
