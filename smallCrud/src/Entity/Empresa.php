<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa
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
    private $nombre_empresa;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $tlf_empresa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email_empresa;

    /**
     * @ORM\Column(type="integer")
     */
    private $sector_empresa;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNombreEmpresa(): ?string
    {
        return $this->nombre_empresa;
    }

    public function setNombreEmpresa(string $nombre_empresa): self
    {
        $this->nombre_empresa = $nombre_empresa;

        return $this;
    }

    public function getTlfEmpresa(): ?string
    {
        return $this->tlf_empresa;
    }

    public function setTlfEmpresa(?string $tlf_empresa): self
    {
        $this->tlf_empresa = $tlf_empresa;

        return $this;
    }

    public function getEmailEmpresa(): ?string
    {
        return $this->email_empresa;
    }

    public function setEmailEmpresa(?string $email_empresa): self
    {
        $this->email_empresa = $email_empresa;

        return $this;
    }

    public function getSectorEmpresa(): ?int
    {
        return $this->sector_empresa;
    }

    public function setSectorEmpresa(int $sector_empresa): self
    {
        $this->sector_empresa = $sector_empresa;

        return $this;
    }
}
