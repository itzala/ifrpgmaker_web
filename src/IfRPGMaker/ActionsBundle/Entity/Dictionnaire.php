<?php

namespace IfRPGMaker\ActionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dictionnaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\ActionsBundle\Entity\DictionnaireRepository")
 */
class Dictionnaire
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
     * @ORM\Column(name="synonym", type="string", length=40)
     */
    private $synonym;
    
    
    /**
     * 
     * 
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\ActionsBundle\Entity\Keywords")
     */
    private $keyword;


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
     * Set synonym
     *
     * @param string $synonym
     * @return Dictionnaire
     */
    public function setSynonym($synonym)
    {
        $this->synonym = $synonym;
    
        return $this;
    }

    /**
     * Get synonym
     *
     * @return string 
     */
    public function getSynonym()
    {
        return $this->synonym;
    }

    /**
     * Set keyword
     *
     * @param \IfRPGMaker\ActionsBundle\Entity\Keywords $keyword
     * @return Dictionnaire
     */
    public function setKeyword(\IfRPGMaker\ActionsBundle\Entity\Keywords $keyword = null)
    {
        $this->keyword = $keyword;
    
        return $this;
    }

    /**
     * Get keyword
     *
     * @return \IfRPGMaker\ActionsBundle\Entity\Keywords 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }
}