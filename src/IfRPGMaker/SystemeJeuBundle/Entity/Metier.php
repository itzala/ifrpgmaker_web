<?php

namespace IfRPGMaker\SystemeJeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\SystemeJeuBundle\Entity\MetierRepository")
 */
class Metier
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
     * @ORM\Column(name="intitule", type="string", length=40)
     */
    private $intitule;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu")
     */
    private $systeme_jeu;


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
     * Set intitule
     *
     * @param string $intitule
     * @return Metier
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    
        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set systeme_jeu
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu $systemeJeu
     * @return Metier
     */
    public function setSystemeJeu(\IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu $systemeJeu = null)
    {
        $this->systeme_jeu = $systemeJeu;
    
        return $this;
    }

    /**
     * Get systeme_jeu
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu 
     */
    public function getSystemeJeu()
    {
        return $this->systeme_jeu;
    }
}