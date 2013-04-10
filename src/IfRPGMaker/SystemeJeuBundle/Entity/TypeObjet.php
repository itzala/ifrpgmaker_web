<?php

namespace IfRPGMaker\SystemeJeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeObjet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\SystemeJeuBundle\Entity\TypeObjetRepository")
 */
class TypeObjet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=40)
     */
    private $nom;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\PartieCorps")
     */
    private $partie_corps;


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
     * @return TypeObjet
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
     * Set partie_corps
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\PartieCorps $partieCorps
     * @return TypeObjet
     */
    public function setPartieCorps(\IfRPGMaker\SystemeJeuBundle\Entity\PartieCorps $partieCorps = null)
    {
        $this->partie_corps = $partieCorps;
    
        return $this;
    }

    /**
     * Get partie_corps
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\PartieCorps 
     */
    public function getPartieCorps()
    {
        return $this->partie_corps;
    }
}