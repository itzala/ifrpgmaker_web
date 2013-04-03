<?php

namespace IfRPGMaker\DialogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dialogue
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\DialogueBundle\Entity\DialogueRepository")
 */
class Dialogue
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
     * @ORM\Column(name="auteur", type="string", length=40)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=40)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="perso", type="smallint")
     */
    private $perso;

    /**
     * @var integer
     *
     * @ORM\Column(name="contrainte", type="smallint")
     */
    private $contrainte;

    /**
     * @var string
     *
     * @ORM\Column(name="dialogues", type="text")
     */
    private $dialogues;


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
     * Set auteur
     *
     * @param string $auteur
     * @return Dialogue
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Dialogue
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
     * Set perso
     *
     * @param integer $perso
     * @return Dialogue
     */
    public function setPerso($perso)
    {
        $this->perso = $perso;
    
        return $this;
    }

    /**
     * Get perso
     *
     * @return integer 
     */
    public function getPerso()
    {
        return $this->perso;
    }

    /**
     * Set contrainte
     *
     * @param integer $contrainte
     * @return Dialogue
     */
    public function setContrainte($contrainte)
    {
        $this->contrainte = $contrainte;
    
        return $this;
    }

    /**
     * Get contrainte
     *
     * @return integer 
     */
    public function getContrainte()
    {
        return $this->contrainte;
    }

    /**
     * Set dialogues
     *
     * @param string $dialogues
     * @return Dialogue
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
}
