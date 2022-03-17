<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
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
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Phone::class, mappedBy="company_id", cascade={"persist", "remove"})
     */
    private $yes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getYes(): ?Phone
    {
        return $this->yes;
    }

    public function setYes(Phone $yes): self
    {
        // set the owning side of the relation if necessary
        if ($yes->getCompanyId() !== $this) {
            $yes->setCompanyId($this);
        }

        $this->yes = $yes;

        return $this;
    }
}
