<?php

namespace IfRPGMaker\HistoireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\HistoireBundle\Entity\EvenementRepository")
 */
class Evenement
{
     /**
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Intro")
     * @ORM\Id
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $intro;
    
    /**
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Description")
     * @ORM\Id
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $description;
    
    public function __construct() {
        $this->intro = " ";
        $this->description = " ";
    }

    /**
     * Set intro
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Intro $intro
     * @return Evenement
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
     * @return Evenement
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
}