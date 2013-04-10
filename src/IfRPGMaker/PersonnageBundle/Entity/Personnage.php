<?php

namespace IfRPGMaker\PersonnageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\PersonnageBundle\Entity\PersonnageRepository")
 */
class Personnage
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
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\Race")
     */
    private $race;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\Metier")
     */
    private $metier;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\Classe")
     */
    private $classe;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\UserBundle\Entity\Joueur")
     */
    private $joueur;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\Taille")
     */
    private $taille;


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
     * @return Personnage
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
     * Set race
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\Race $race
     * @return Personnage
     */
    public function setRace(\IfRPGMaker\SystemeJeuBundle\Entity\Race $race = null)
    {
        $this->race = $race;
    
        return $this;
    }

    /**
     * Get race
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\Race 
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set metier
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\Metier $metier
     * @return Personnage
     */
    public function setMetier(\IfRPGMaker\SystemeJeuBundle\Entity\Metier $metier = null)
    {
        $this->metier = $metier;
    
        return $this;
    }

    /**
     * Get metier
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\Metier 
     */
    public function getMetier()
    {
        return $this->metier;
    }

    /**
     * Set classe
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\Classe $classe
     * @return Personnage
     */
    public function setClasse(\IfRPGMaker\SystemeJeuBundle\Entity\Classe $classe = null)
    {
        $this->classe = $classe;
    
        return $this;
    }

    /**
     * Get classe
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\Classe 
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set joueur
     *
     * @param \IfRPGMaker\UserBundle\Entity\Joueur $joueur
     * @return Personnage
     */
    public function setJoueur(\IfRPGMaker\UserBundle\Entity\Joueur $joueur = null)
    {
        $this->joueur = $joueur;
    
        return $this;
    }

    /**
     * Get joueur
     *
     * @return \IfRPGMaker\UserBundle\Entity\Joueur 
     */
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * Set taille
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\Taille $taille
     * @return Personnage
     */
    public function setTaille(\IfRPGMaker\SystemeJeuBundle\Entity\Taille $taille = null)
    {
        $this->taille = $taille;
    
        return $this;
    }

    /**
     * Get taille
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\Taille 
     */
    public function getTaille()
    {
        return $this->taille;
    }
}