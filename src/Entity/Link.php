<?php

namespace App\Entity;

use App\Repository\LinkRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=LinkRepository::class)
 */
class Link
{
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $url;

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255)
     * @Assert\Blank
     */
    private $hash;

    public function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }
}
