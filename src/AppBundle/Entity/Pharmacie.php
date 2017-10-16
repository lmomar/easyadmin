<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pharmacie
 *
 * @ORM\Table(name="pharmacie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PharmacieRepository")
 */
class Pharmacie
{
    public function __construct()
    {
        $this->created = new \DateTime();
    }

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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\pharmacieGroup",cascade={"persist"})
     */
    private $pharmacieGroup;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Pharmacie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Pharmacie
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Pharmacie
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set pharmacieGroup
     *
     * @param \AppBundle\Entity\pharmacieGroup $pharmacieGroup
     * @return Pharmacie
     */
    public function setPharmacieGroup(\AppBundle\Entity\pharmacieGroup $pharmacieGroup = null)
    {
        $this->pharmacieGroup = $pharmacieGroup;

        return $this;
    }

    /**
     * Get pharmacieGroup
     *
     * @return \AppBundle\Entity\pharmacieGroup 
     */
    public function getPharmacieGroup()
    {
        return $this->pharmacieGroup;
    }

    public function __toString()
    {
        return $this->getNom() ? $this->getNom() : '';
    }
}
