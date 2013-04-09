<?php

namespace IfRPGMaker\DialoguesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Choix
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\DialoguesBundle\Entity\ChoixRepository")
 */
class Dialogues
{
    /**
     *@ORM\ManyToOne(targetEntity="IfRPGMaker\UserBundle\Entity\Joueur")
     *@ORM\JoinColumn(nullable=false)
     *
     */
    private $auteur;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=40)
     * @ORM\JoinColumn(nullable=false)
     */
    private $description;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\PersonnageBundle\Entity\PersonnageController")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $perso;
    
    
    // *
    //  * @ORM\ManyToOne(targetEntity="IfRPGMaker\ContrainteBundle\Entity\ElementContrainte")
    //  * @ORM\JoinColumn(nullable=false)
    //  * 
     
    // private $contraites;
    
    /**
     * @var string
     *
     * @ORM\Column(name="dialogues", type="text")
     * 
     */
    private $dialogues;
    
    
    public function __construct() {
        //TODO savais quoi y mettre exatement.
    }
    
    /**
     * Get auteur
     *
     * @return \IfRPGMaker\UserBundle\Entity\Joueur 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Get Perso
     *
     * @return \IfRPGMaker\PersonnageBundle\Entity\Personnage
     */
    public function getPerso()
    {
        return $this->perso;
    }
    
    /**
     * Set description
     *
     * @param string $description
     * @return Dialogues
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dialogues
     *
     * @param string $dialogues
     * @return Dialogues
     */
    public function setDialogues($dialogues)
    {
        $this->dialogues = $dialogues;
    
        return $this;
    }

    /**
     * Get dialogues
     *
     * @return string 
     */
    public function getDialogues()
    {
        return $this->dialogues;
    }


    /**
     * Set auteur
     *
     * @param \IfRPGMaker\UserBundle\Entity\Joueur $auteur
     * @return Histoire
     */
    public function setAuteur(\IfRPGMaker\UserBundle\Entity\Joueur $auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Set perso
     *
     * @param \IfRPGMaker\PersonnageBundle\Entity\Personnage $perso)
     * @return Histoire
     */
    public function setPerso(\IfRPGMaker\PersonnageBundle\Entity\Personnage $perso)
    {
        $this->perso = $perso;
    
        return $this;
    }


  
    public function __toString() {
        return $this->auteur;
    }
    
}