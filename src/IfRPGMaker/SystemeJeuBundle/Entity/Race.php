<?php

namespace IfRPGMaker\SystemeJeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Race
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\SystemeJeuBundle\Entity\RaceRepository")
 */
class Race
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
     * Set nom
     *
     * @param string $nom
     * @return Race
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
     * Set systeme_jeu
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu $systemeJeu
     * @return Race
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