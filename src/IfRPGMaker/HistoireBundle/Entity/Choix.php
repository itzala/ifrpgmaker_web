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
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Evenement")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="intro")
     * @ORM\Column(name="intro")
     * 
     */
    private $intro;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Evenement")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="description")
     * @ORM\Column(name="description")
     * 
     */
    private $description;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Choix")
     * @ORM\JoinColumn(nullable=true)
     * @ORM\Column(name="parent")
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
     * Set parent
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Choix $parent
     * @return Choix
     */
    public function setParent($parent)
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
    
    public function getArrayIds()
    {
        return array('id' => $this->id);
    }

    /**
     * Set intro
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Evenement $intro
     * @return Choix
     */
    public function setIntro(\IfRPGMaker\HistoireBundle\Entity\Evenement $intro = null)
    {
        $this->intro = $intro;
    
        return $this;
    }

    /**
     * Get intro
     *
     * @return \IfRPGMaker\HistoireBundle\Entity\Evenement 
     */
    public function getIntro()
    {
        return $this->intro->getIntro();
    }

    /**
     * Set description
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Evenement $description
     * @return Choix
     */
    public function setDescription(\IfRPGMaker\HistoireBundle\Entity\Evenement $description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return \IfRPGMaker\HistoireBundle\Entity\Evenement 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    public function __toString() {
        return $this->id."-".$this->getIntro();
    }
}