<?php

namespace SoftUniBlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\BrowserKit\Request;

/**
 * Tag
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="SoftUniBlogBundle\Repository\TagRepository")
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="SoftUniBlogBundle\Entity\Article", mappedBy="tags")
     */
    private $articles;

    /**
     * @return ArrayCollection]
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param ArrayCollection $articles
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;
    }

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->getName();
    }

}

