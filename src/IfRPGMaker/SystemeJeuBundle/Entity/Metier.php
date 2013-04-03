<?php

namespace IfRPGMaker\SystemeJeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\SystemeJeuBundle\Entity\MetierRepository")
 */
class Metier
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
     * @ORM\Column(name="intitule", type="string", length=40)
     */
    private $intitule;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_systeme_jeu", type="smallint")
     */
    private $id_systeme_jeu;


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
     * Set intitule
     *
     * @param string $intitule
     * @return Metier
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    
        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set id_systeme_jeu
     *
     * @param integer $idSystemeJeu
     * @return Metier
     */
    public function setIdSystemeJeu($idSystemeJeu)
    {
        $this->id_systeme_jeu = $idSystemeJeu;
    
        return $this;
    }

    /**
     * Get id_systeme_jeu
     *
     * @return integer 
     */
    public function getIdSystemeJeu()
    {
        return $this->id_systeme_jeu;
    }
}
