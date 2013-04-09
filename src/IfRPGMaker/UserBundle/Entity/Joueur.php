<?php

namespace IfRPGMaker\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\UserBundle\Entity\JoueurRepository")
 */
class Joueur
{
    /**
     *
     * @ORM\Id
     * @ORM\Column(name="pseudo", type="string", length=40)
     */
    
    private $pseudo;
    
    /**
     *
     * @var string
     * @ORM\Column(name="mdp", type="string", length=40)
     * 
     */
    
    private $mdp;
    
    
    public function __construct($pseudo = "Anonyme", $mdp = "Anonymous")
    {
        $this->mdp = $mdp;
        $this->pseudo = $pseudo;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Joueur
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

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return Joueur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    
        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
    }
    
    public function __toString() 
    {
        return $this->pseudo;
    }
    
    public function getArrayIds()
    {
        return array("pseudo" => $this->pseudo);
    }
}