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
     * @ORM\Column(name="titre", type="string", length=40)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $date_creation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modification", type="datetime")
     */
    private $date_modification;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\UserBundle\Entity\Joueur")
     */
    private $auteur;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Description")
     */
    private $description;


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
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date_creation
     *
     * @param \DateTime $dateCreation
     * @return Histoire
     */
    public function setDateCreation($dateCreation)
    {
        $this->date_creation = $dateCreation;
    
        return $this;
    }

    /**
     * Get date_creation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set date_modification
     *
     * @param \DateTime $dateModification
     * @return Histoire
     */
    public function setDateModification($dateModification)
    {
        $this->date_modification = $dateModification;
    
        return $this;
    }

    /**
     * Get date_modification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->date_modification;
    }

    /**
     * Set auteur
     *
     * @param \IfRPGMaker\UserBundle\Entity\Joueur $auteur
     * @return Histoire
     */
    public function setAuteur(\IfRPGMaker\UserBundle\Entity\Joueur $auteur = null)
    {
        $this->auteur = $auteur;
    
        return $this;
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
     * Set description
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Description $description
     * @return Histoire
     */
    public function setDescription(\IfRPGMaker\HistoireBundle\Entity\Description $description = null)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return \IfRPGMaker\HistoireBundle\Entity\Description 
     */
    public function getDescription()
    {
        return $this->description;
    }
}