<?php

namespace IfRPGMaker\SystemeJeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SystemeJeu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeuRepository")
 */
class SystemeJeu
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
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\UserBundle\Entity\Joueur")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="pseudo", name="createur")
     * 
     */
    private $createur;

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
     * Set createur
     *
     * @param \IfRPGMaker\UserBundle\Entity\Joueur $createur
     * @return SystemeJeu
     */
    public function setCreateur(\IfRPGMaker\UserBundle\Entity\Joueur $createur)
    {
        $this->createur = $createur;
    
        return $this;
    }

    /**
     * Get createur
     *
     * @return \IfRPGMaker\UserBundle\Entity\Joueur 
     */
    public function getCreateur()
    {
        return $this->createur;
    }
    
    public function __toString() 
    {
        return $this->id. " créé par " .$this->createur;
    }
    
    public function getArrayIds()
    {
        return array("id" => $this->id);
    }
}