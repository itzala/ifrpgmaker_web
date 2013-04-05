<?php

namespace IfRPGMaker\HistoireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scenario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\HistoireBundle\Entity\ScenarioRepository")
 */
class Scenario
{    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\UserBundle\Entity\Joueur")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="pseudo")
     * 
     */
    private $auteur;
    
    
    /**
     * @ORM\Id
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $titre_histoire;
    
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Choix")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $debut;
    
    public function __construct($histoire) {
        $this->auteur = $histoire->getAuteur();
        $this->titre_histoire = $histoire;
    }

    /**
     * Set debut
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Choix $debut
     * @return Scenario
     */
    public function setDebut(\IfRPGMaker\HistoireBundle\Entity\Choix $debut)
    {
        $this->debut = $debut;
    
        return $this;
    }

    /**
     * Get debut
     *
     * @return \IfRPGMaker\HistoireBundle\Entity\Choix 
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set auteur
     *
     * @param \IfRPGMaker\UserBundle\Entity\Joueur $auteur
     * @return Scenario
     */
    public function setAuteur(\IfRPGMaker\UserBundle\Entity\Joueur $auteur)
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
     * Set titre_histoire
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Histoire $titreHistoire
     * @return Scenario
     */
    public function setTitreHistoire(\IfRPGMaker\HistoireBundle\Entity\Histoire $titreHistoire)
    {
        $this->titre_histoire = $titreHistoire;
    
        return $this;
    }

    /**
     * Get titre_histoire
     *
     * @return \IfRPGMaker\HistoireBundle\Entity\Histoire 
     */
    public function getTitreHistoire()
    {
        return $this->titre_histoire;
    }
    
    public function __toString() {
        return $this->debut->__toString();
    }
    
    public function getArrayIds()
    {
        return array('auteur' => $this->auteur, 'titre_histoire' => $this->titre_histoire, 'debut' => $this->debut);
    }
}