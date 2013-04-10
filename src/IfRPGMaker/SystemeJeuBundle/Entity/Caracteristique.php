<?php

namespace IfRPGMaker\SystemeJeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\SystemeJeuBundle\Entity\CaracteristiqueRepository")
 */
class Caracteristique
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
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu")
     */
    private $systeme;


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
     * @return Caracteristique
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
     * Set systeme
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu $systeme
     * @return Caracteristique
     */
    public function setSysteme(\IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu $systeme = null)
    {
        $this->systeme = $systeme;
    
        return $this;
    }

    /**
     * Get systeme
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu 
     */
    public function getSysteme()
    {
        return $this->systeme;
    }
}