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
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }
}