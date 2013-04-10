<?php

namespace IfRPGMaker\ActionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActiKey
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\ActionsBundle\Entity\ActiKeyRepository")
 */
class ActiKey
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
     * 
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\ActionsBundle\Entity\Keywords")
     */
    private $keyword;
    
    
    /**
     * 
     * 
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\ActionsBundle\Entity\Actions")
     */
    private $action;
    
    
    


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
     * @param \IfRPGMaker\ActionsBundle\Entity\Keywords $keyword
     * @return ActiKey
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

    /**
     * Set action
     *
     * @param \IfRPGMaker\ActionsBundle\Entity\Actions $action
     * @return ActiKey
     */
    public function setAction(\IfRPGMaker\ActionsBundle\Entity\Actions $action = null)
    {
        $this->action = $action;
    
        return $this;
    }

    /**
     * Get action
     *
     * @return \IfRPGMaker\ActionsBundle\Entity\Actions 
     */
    public function getAction()
    {
        return $this->action;
    }
}