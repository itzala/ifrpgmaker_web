<?php

namespace IfRPGMaker\PersoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\PersoBundle\Entity\PersonnageRepository")
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
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=40)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="metier", type="string", length=40)
     */
    private $metier;

    /**
     * @var string
     *
     * @ORM\Column(name="classe", type="string", length=40)
     */
    private $classe;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=40)
     */
    private $pseudo;

    //TODO taille ENUM('Petite', 'Moyenne', 'Grande')

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
