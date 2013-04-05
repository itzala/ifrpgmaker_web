<?php

namespace IfRPGMaker\ActionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActiKey
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\ActionsBundle\Entity\ActionRepository")
 */
class ActiKey
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\ActionsBundle\Entity\Keywords")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="keyword")
     * 
     */
    private $keyword;

   /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\ActionsBundle\Entity\Actions")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="action")
     * 
     */
    private $action;
    

    public function __construct($keyword, $action) {
        $this->keyword = $keyword;
        $this->action = $action;
    }


    /**
     * Set action
     *
     * @param \IfRPGMaker\ActionsBundle\Entity\Actions $action
     * @return ActiKey
     */
    public function setAction(\IfRPGMaker\ActionsBundle\Entity\Actions $action)
    {
        $this->action = $action;
    
        return $this;
    }

    /**
     * Get action
     *
     * @return \IfRPGMaker\ActionsBundle\Entity\Actions $action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set keyword
     *
     * @param IfRPGMaker\ActionsBundle\Entity\Keywords $keyword
     * @return ActiKey
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
     * @return IfRPGMaker\ActionsBundle\Entity\Keywords $keyword
     *
     */
    public function getkeyword()
    {
        return $this->keyword;
    }

    public function __toString() {
        return '('+$this->action+'; '+this->keyword+')';
    }
    
    public function getArrayIds()
    {
        return array('action' => $this->action, 'keyword' => $this->keyword);
    }
}