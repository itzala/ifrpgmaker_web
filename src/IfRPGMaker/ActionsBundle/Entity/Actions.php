<?php

namespace IfRPGMaker\ActionsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actions
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\ActionsBundle\Entity\ActionsRepository")
 */
class Actions
{

    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="action", type="string", length=40)
     */
    private $action;


    /**
     * Set action
     *
     * @param string $action
     * @return Actions
     */
    public function setKeyword($action)
    {
        $this->action = $action;
    
        return $this;
    }

    /**
     * Get action
     *
     * @return \IfRPGMaker\ActionsBundle\Entity\Actions $action
     */
    public function getKeyword()
    {
        return $this->action;
    }


    public function __toString() {
        return $this->action;
    }
    
    public function getArrayIds()
    {
        return array('action' => $this->action);
    }
}