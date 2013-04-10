<?php

namespace IfRPGMaker\DialoguesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dialogues
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\DialoguesBundle\Entity\DialoguesRepository")
 */
class Dialogues
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
     * @ORM\Column(name="dialogues", type="text")
     */
    private $dialogues;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\UserBundle\Entity\Joueur")
     */
    private $auteur;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\HistoireBundle\Entity\Description")
     */
    private $description;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\PersonnageBundle\Entity\Personnage")
     */
    private $perso;


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
     * Set dialogues
     *
     * @param string $dialogues
     * @return Dialogues
     */
    public function setDialogues($dialogues)
    {
        $this->dialogues = $dialogues;
    
        return $this;
    }

    /**
     * Get dialogues
     *
     * @return string 
     */
    public function getDialogues()
    {
        return $this->dialogues;
    }
}
