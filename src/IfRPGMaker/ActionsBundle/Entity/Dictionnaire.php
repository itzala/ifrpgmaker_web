<?php

namespace IfRPGMaker\DictionnaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dictionnaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\DictionnaireBundle\Entity\DictionnaireRepository")
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
     * @ORM\Column(name="keyword", type="string", length=40)
     */
    private $keyword;

    /**
     * @var string
     *
     * @ORM\Column(name="synonym", type="string", length=40)
     */
    private $synonym;


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
     * Set keyword
     *
     * @param string $keyword
     * @return Dictionnaire
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    
        return $this;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
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
}
