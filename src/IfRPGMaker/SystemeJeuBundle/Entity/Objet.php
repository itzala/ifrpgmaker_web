<?php

namespace IfRPGMaker\SystemeJeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\SystemeJeuBundle\Entity\ObjetRepository")
 */
class Objet
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
     * @ORM\Column(name="poids", type="smallint")
     */
    private $poids;

    /**
     * @var integer
     *
     * @ORM\Column(name="encombrement", type="smallint")
     */
    private $encombrement;

    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\TypeObjet")
     */
    private $type_objet;

    /**
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu")
     */
    private $systeme_jeu;


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
     * @return Objet
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
     * Set poids
     *
     * @param integer $poids
     * @return Objet
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    
        return $this;
    }

    /**
     * Get poids
     *
     * @return integer 
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set encombrement
     *
     * @param integer $encombrement
     * @return Objet
     */
    public function setEncombrement($encombrement)
    {
        $this->encombrement = $encombrement;
    
        return $this;
    }

    /**
     * Get encombrement
     *
     * @return integer 
     */
    public function getEncombrement()
    {
        return $this->encombrement;
    }

    /**
     * Set type_objet
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\TypeObjet $typeObjet
     * @return Objet
     */
    public function setTypeObjet(\IfRPGMaker\SystemeJeuBundle\Entity\TypeObjet $typeObjet = null)
    {
        $this->type_objet = $typeObjet;
    
        return $this;
    }

    /**
     * Get type_objet
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\TypeObjet 
     */
    public function getTypeObjet()
    {
        return $this->type_objet;
    }

    /**
     * Set systeme_jeu
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu $systemeJeu
     * @return Objet
     */
    public function setSystemeJeu(\IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu $systemeJeu = null)
    {
        $this->systeme_jeu = $systemeJeu;
    
        return $this;
    }

    /**
     * Get systeme_jeu
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\SystemeJeu 
     */
    public function getSystemeJeu()
    {
        return $this->systeme_jeu;
    }
}