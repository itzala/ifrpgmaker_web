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
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Intro")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $intro;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Description")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $description;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Choix")
     * @ORM\JoinColumn(nullable=true)
     * 
     */
    private $parent;
    
    
    public function __construct($event = NULL) {
        if ($event == NULL) {
            $this->intro = " ";
            $this->description = " ";
        }
        else {
            $this->intro = $event->getIntro();
            $this->description = $event->getDescription();
        }
    }
    
    


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
    public function setEvenement(\IfRPGMaker\HistoireBundle\Entity\Evenement $evenement)
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
    public function setParent(\IfRPGMaker\HistoireBundle\Entity\Choix $parent)
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

    /**
     * Set intro
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Intro $intro
     * @return Choix
     */
    public function setIntro(\IfRPGMaker\HistoireBundle\Entity\Intro $intro)
    {
        $this->intro = $intro;
    
        return $this;
    }

    /**
     * Get intro
     *
     * @return \IfRPGMaker\HistoireBundle\Entity\Intro 
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set description
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Description $description
     * @return Choix
     */
    public function setDescription(\IfRPGMaker\HistoireBundle\Entity\Description $description)
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
    
    public function __toString() {
        if ($this->intro == NULL) {
            return " ";
        }
        return $this->intro->getContenu();
    }
}