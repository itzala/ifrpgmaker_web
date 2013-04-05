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
     * @var string
     * @ORM\Id
     * @ORM\Column(name="nom", type="string", length=40)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="taille", type="integer")
     */
    private $taille;
        
    
    /**
     * 
     * @ORM\Column(name="metier", type="string", length=40)
     */
    
    private $metier;
    
    /**
     * 
     * @ORM\Column(name="classe", type="string", length=40)
     */
    
    private $classe;
    
    
    /**
     * 
     * @ORM\Column(name="race", type="string", length=40)
     */
    
    private $race;
    
    
    /**
     * 
     * @ORM\Column(name="pseudo", type="string", length=40)
     */
    
    private $pseudo;
    

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
     * Set taille
     *
     * @param int $taille
     * @return Personnage
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
    
        return $this;
    }

    /**
     * Get taille
     *
     * @return int 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set metier
     *
     * @param string $metier
     * @return Personnage
     */
    public function setMetier($metier)
    {
        $this->metier = $metier;
    
        return $this;
    }

    /**
     * Get metier
     *
     * @return string 
     */
    public function getMetier()
    {
        return $this->metier;
    }

    /**
     * Set classe
     *
     * @param string $classe
     * @return Personnage
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    
        return $this;
    }

    /**
     * Get classe
     *
     * @return string 
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set race
     *
     * @param string $race
     * @return Personnage
     */
    public function setRace($race)
    {
        $this->race = $race;
    
        return $this;
    }

    /**
     * Get race
     *
     * @return string 
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Personnage
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    
        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }
}