<?php

namespace IfRPGMaker\ContraintesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrainte
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\ContraintesBundle\Entity\ContrainteRepository")
 */
class Contrainte
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
     * @ORM\Column(name="id_contrainte", type="smallint")
     */
    private $id_contrainte;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=40)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=40)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_perso", type="string", length=40)
     */
    private $nom_perso;


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
     * Set id_contrainte
     *
     * @param integer $idContrainte
     * @return Contrainte
     */
    public function setIdContrainte($idContrainte)
    {
        $this->id_contrainte = $idContrainte;
    
        return $this;
    }

    /**
     * Get id_contrainte
     *
     * @return integer 
     */
    public function getIdContrainte()
    {
        return $this->id_contrainte;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Contrainte
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Contrainte
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set nom_perso
     *
     * @param string $nomPerso
     * @return Contrainte
     */
    public function setNomPerso($nomPerso)
    {
        $this->nom_perso = $nomPerso;
    
        return $this;
    }

    /**
     * Get nom_perso
     *
     * @return string 
     */
    public function getNomPerso()
    {
        return $this->nom_perso;
    }
}
