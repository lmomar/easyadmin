<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Asset\Context\ContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Coupon
 *
 * @ORM\Table(name="coupon")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CouponRepository")
 */
class Coupon
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pharmacie",cascade={"persist"})
     */
    private $pharmacie;

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
     * Set titre
     *
     * @param string $titre
     * @return Coupon
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Coupon
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Coupon
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
     * Set pharmacie
     *
     * @param \AppBundle\Entity\Pharmacie $pharmacie
     * @return Coupon
     */
    public function setPharmacie(\AppBundle\Entity\Pharmacie $pharmacie = null)
    {
        $this->pharmacie = $pharmacie;

        return $this;
    }

    /**
     * Get pharmacie
     *
     * @return \AppBundle\Entity\Pharmacie 
     */
    public function getPharmacie()
    {
        return $this->pharmacie;
    }

    /**
     * Set pharmacieGroup
     *
     * @param \AppBundle\Entity\pharmacieGroup $pharmacieGroup
     * @return Coupon
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
        return $this->getTitre() ? $this->getTitre() : '';
    }

    /**
     * @Assert\Callback()
     */
    public function validatePharmacieOrGroupe(ExecutionContextInterface $context){
        if(empty($this->pharmacie) && empty($this->pharmacieGroup)){
            $context->buildViolation("Vous devez sélectionner au moin une pharmacie ou un groupe !")
                ->addViolation();
        }
    }
}
