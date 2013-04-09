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
     * @var string
     * @ORM\Id
     * @ORM\Column(name="nom", type="string", length=40)
     */
    private $nom;
    
    /**
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id", name="id_systeme_jeu")
     */
    private $id_systeme_jeu;

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
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu $idSystemeJeu
     * @return Caracteristique
     */
    public function setIdSystemeJeu(\IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu $idSystemeJeu)
    {
        $this->id_systeme_jeu = $idSystemeJeu;
    
        return $this;
    }

    /**
     * Get id_systeme_jeu
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu 
     */
    public function getIdSystemeJeu()
    {
        return $this->id_systeme_jeu;
    }
}