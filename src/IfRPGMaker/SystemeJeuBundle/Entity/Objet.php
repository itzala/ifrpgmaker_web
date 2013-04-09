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
     * @ORM\Column(name="poids", type="integer")
     */
    private $poids;

    /**
     * @var integer
     *
     * @ORM\Column(name="encombrement", type="integer")
     */
    private $encombrement;


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
}
