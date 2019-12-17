<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectorRepository")
 */
class Sector
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_sector;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreSector(): ?string
    {
        return $this->nombre_sector;
    }

    public function setNombreSector(string $nombre_sector): self
    {
        $this->nombre_sector = $nombre_sector;

        return $this;
    }
}
