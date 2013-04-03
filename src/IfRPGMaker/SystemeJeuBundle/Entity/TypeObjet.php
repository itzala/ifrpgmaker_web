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
     * @var string
     *
     * @ORM\Column(name="partie_corps", type="string", length=40)
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
     * @param string $partieCorps
     * @return TypeObjet
     */
    public function setPartieCorps($partieCorps)
    {
        $this->partie_corps = $partieCorps;
    
        return $this;
    }

    /**
     * Get partie_corps
     *
     * @return string 
     */
    public function getPartieCorps()
    {
        return $this->partie_corps;
    }
}
