<?php

namespace SnowTricksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Trick
 *
 * @ORM\Table(name="trick")
 * @ORM\Entity(repositoryClass="SnowTricksBundle\Repository\TrickRepository")
 */
class Trick
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @Gedmo\Slug(fields={"name"}, unique=true)
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="trick", cascade={"all"}, orphanRemoval=true)
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity="Video", mappedBy="trick", cascade={"all"}, orphanRemoval=true)
     */
    private $videos;

    /**
     * @ORM\OneToOne(targetEntity="Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

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
     * @return Trick
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
     * Set description
     *
     * @param string $description
     *
     * @return Trick
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set name
     *
     * @param string $slug
     *
     * @return Trick
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->videos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \SnowTricksBundle\Entity\Image $image
     *
     * @return Trick
     */
    public function addImage(\SnowTricksBundle\Entity\Image $image)
    {
        $this->images[] = $image;
        $image->setTrick($this);

        return $this;
    }

    /**
     * Remove image
     *
     * @param \SnowTricksBundle\Entity\Image $image
     */
    public function removeImage(\SnowTricksBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add video
     *
     * @param \SnowTricksBundle\Entity\Video $video
     *
     * @return Trick
     */
    public function addVideo(\SnowTricksBundle\Entity\Video $video)
    {
        $this->videos[] = $video;
        $video->setTrick($this);

        return $this;
    }

    /**
     * Remove video
     *
     * @param \SnowTricksBundle\Entity\Video $video
     */
    public function removeVideo(\SnowTricksBundle\Entity\Video $video)
    {
        $this->videos->removeElement($video);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * Set category
     *
     * @param \SnowTricksBundle\Entity\Category $category
     *
     * @return Trick
     */
    public function setCategory(\SnowTricksBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \SnowTricksBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
