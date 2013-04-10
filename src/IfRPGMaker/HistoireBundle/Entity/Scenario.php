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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Histoire")
     */
    private $histoire;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Choix")
     */
    private $debut;


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
     * Set histoire
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Histoire $histoire
     * @return Scenario
     */
    public function setHistoire(\IfRPGMaker\HistoireBundle\Entity\Histoire $histoire = null)
    {
        $this->histoire = $histoire;
    
        return $this;
    }

    /**
     * Get histoire
     *
     * @return \IfRPGMaker\HistoireBundle\Entity\Histoire 
     */
    public function getHistoire()
    {
        return $this->histoire;
    }

    /**
     * Set debut
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Choix $debut
     * @return Scenario
     */
    public function setDebut(\IfRPGMaker\HistoireBundle\Entity\Choix $debut = null)
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
}