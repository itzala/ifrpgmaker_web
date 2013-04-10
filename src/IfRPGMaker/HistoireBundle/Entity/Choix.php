<?php

namespace IfRPGMaker\HistoireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Choix
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\HistoireBundle\Entity\ChoixRepository")
 */
class Choix
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
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Evenement")
     */
    private $evenement;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Choix")
     */
    private $parent;


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
     * Set evenement
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Evenement $evenement
     * @return Choix
     */
    public function setEvenement(\IfRPGMaker\HistoireBundle\Entity\Evenement $evenement = null)
    {
        $this->evenement = $evenement;
    
        return $this;
    }

    /**
     * Get evenement
     *
     * @return \IfRPGMaker\HistoireBundle\Entity\Evenement 
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * Set parent
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Choix $parent
     * @return Choix
     */
    public function setParent(\IfRPGMaker\HistoireBundle\Entity\Choix $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \IfRPGMaker\HistoireBundle\Entity\Choix 
     */
    public function getParent()
    {
        return $this->parent;
    }
}