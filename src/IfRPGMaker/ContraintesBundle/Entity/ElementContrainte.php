<?php

namespace IfRPGMaker\ContraintesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElementContrainte
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\ContraintesBundle\Entity\ElementContrainteRepository")
 */
class ElementContrainte
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
     * @var integer
     *
     * @ORM\Column(name="id_element", type="smallint")
     */
    private $id_element;


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
     * Set id_element
     *
     * @param integer $idElement
     * @return ElementContrainte
     */
    public function setIdElement($idElement)
    {
        $this->id_element = $idElement;
    
        return $this;
    }

    /**
     * Get id_element
     *
     * @return integer 
     */
    public function getIdElement()
    {
        return $this->id_element;
    }
}
