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
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\ActionsBundle\Entity\Keywords")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="keyword")
     * 
     */
    private $keyword;

       /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="synonyme", type="string", length=40)
     */
    private $synonyme;
    

    public function __construct($keyword, $synonyme) {
        $this->keyword = $keyword;
        $this->synonyme = $synonyme;
    }


    /**
     * Set synonyme
     *
     * @param string $synonyme
     * @return Dictionnaire
     */
    public function setSynonyme($synonyme)
    {
        $this->synonyme = $synonyme;
    
        return $this;
    }

    /**
     * Get synonyme
     *
     * @return string
     */
    public function getSynonyme()
    {
        return $this->synonyme;
    }

    /**
     * Set keyword
     *
     * @param IfRPGMaker\ActionsBundle\Entity\Keywords $keyword
     * @return Dictionnaire
     *
     */
    public function setKeyword(IfRPGMaker\ActionsBundle\Entity\Keywords $keyword)
    {
        $this->keyword = $keyword;
    
        return $this;
    }

    /**
     * Get keyword
     *
     * @return IfRPGMaker\ActionsBundle\Entity\Keywords
     *
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    public function __toString() {
        return '('.$this->keyword.'; '.this->synonyme.')';
    }
    
    public function getArrayIds()
    {
        return array('synonyme' => $this->synonyme, 'keyword' => $this->keyword);
    }
}