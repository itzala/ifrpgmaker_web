<?php

namespace IfRPGMaker\PersonnageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CaractPersoHistoire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\PersonnageBundle\Entity\CaractPersoHistoireRepository")
 */
class CaractPersoHistoire
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
     * @var integer
     *
     * @ORM\Column(name="valeur", type="integer")
     */
    private $valeur;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\Caracteristique")
     */
    private $carac;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\PersonnageBundle\Entity\Personnage")
     */
    private $perso;


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
     * Set valeur
     *
     * @param integer $valeur
     * @return CaractPersoHistoire
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    
        return $this;
    }

    /**
     * Get valeur
     *
     * @return integer 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set carac
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\Caracteristique $carac
     * @return CaractPersoHistoire
     */
    public function setCarac(\IfRPGMaker\SystemeJeuBundle\Entity\Caracteristique $carac = null)
    {
        $this->carac = $carac;
    
        return $this;
    }

    /**
     * Get carac
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\Caracteristique 
     */
    public function getCarac()
    {
        return $this->carac;
    }

    /**
     * Set perso
     *
     * @param \IfRPGMaker\PersonnageBundle\Entity\Personnage $perso
     * @return CaractPersoHistoire
     */
    public function setPerso(\IfRPGMaker\PersonnageBundle\Entity\Personnage $perso = null)
    {
        $this->perso = $perso;
    
        return $this;
    }

    /**
     * Get perso
     *
     * @return \IfRPGMaker\PersonnageBundle\Entity\Personnage 
     */
    public function getPerso()
    {
        return $this->perso;
    }
}