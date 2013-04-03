<?php

namespace IfRPGMaker\SystemeJeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\SystemeJeuBundle\Entity\CaracteristiqueRepository")
 */
class Caracteristique
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
     * @ORM\Column(name="nom", type="string", length=40)
     */
    private $nom;

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
     * Set nom
     *
     * @param string $nom
     * @return Caracteristique
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set id_systeme_jeu
     *
     * @param integer $idSystemeJeu
     * @return Caracteristique
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
