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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Intro")
     */
    private $intro;
    
    
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
     * Set intro
     *
     * @param \IfRPGMaker\HistoireBundle\Entity\Intro $intro
     * @return Evenement
     */
    public function setIntro(\IfRPGMaker\HistoireBundle\Entity\Intro $intro = null)
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