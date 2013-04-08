<?php

namespace IfRPGMaker\ActionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Keywords
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\ActionsBundle\Entity\KeywordsRepository")
 */
class Keywords
{

    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="keyword", type="string", length=40)
     */
    private $keyword;


    /**
     * Set keyword
     *
     * @param string $keyword
     * @return Keywords
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    
        return $this;
    }

    /**
     * Get keyword
     *
     * @return \IfRPGMaker\ActionsBundle\Entity\Actions $keyword
     */
    public function getKeyword()
    {
        return $this->keyword;
    }


    public function __toString() {
        return $this->keyword;
    }
    
    public function getArrayIds()
    {
        return array('keyword' => $this->keyword);
    }
}