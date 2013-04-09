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
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Intro")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ORM\Column(name="intro", type="integer")
     * 
     */
    private $intro;
    
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Description")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @ORM\Column(name="description", type="integer")
     * 
     */
    private $description;

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
        return substr($this->intro.getContenu(), 0, 30)." - ".substr($this->description->getContenu(), 0, 30);
    }
    
    public function __construct(\IfRPGMaker\HistoireBundle\Entity\Intro $intro, 
            \IfRPGMaker\HistoireBundle\Entity\Description $description) {
        $this->intro = $intro->getId();
        $this->description = $description->getId();
    }
    
    public function getArrayIds() {
        return array('intro' => $this->intro->getId(), 'description' => $this->description->getId());
    }
}