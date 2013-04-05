<?php

namespace IfRPGMaker\HistoireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Histoire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\HistoireBundle\Entity\HistoireRepository")
 */
class Histoire
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation", type="datetime")
     */
    private $creation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modification", type="datetime")
     */
    private $modification;

    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="titre", type="string", length=40)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\UserBundle\Entity\Joueur")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="pseudo")
     * 
     */
    private $auteur;
    
    public function __construct($auteur) {
        $this->auteur = $auteur;
        $this->titre = " ";
    }

    /**
     * Set creation
     *
     * @param \DateTime $creation
     * @return Histoire
     */
    public function setCreation($creation)
    {
        $this->creation = $creation;
    
        return $this;
    }

    /**
     * Get creation
     *
     * @return \DateTime 
     */
    public function getCreation()
    {
        return $this->creation;
    }

    /**
     * Set modification
     *
     * @param \DateTime $modification
     * @return Histoire
     */
    public function setModification($modification)
    {
        $this->modification = $modification;
    
        return $this;
    }

    /**
     * Get modification
     *
     * @return \DateTime 
     */
    public function getModification()
    {
        return $this->modification;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Histoire
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
     * Get auteur
     *
     * @return \IfRPGMaker\UserBundle\Entity\Joueur 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Histoire
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
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
    
    public function __toString() {
        return $this->titre;
    }
    
    public function getArrayIds()
    {
        return array('auteur' => $this->auteur, 'titre' => $this->titre);
    }
}