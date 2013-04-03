<?php

namespace IfRPGMaker\PersoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CaractPersoBundle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\PersoBundle\Entity\CaractPersoBundleRepository")
 */
class CaractPersoBundle
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
     * @ORM\Column(name="caract", type="string", length=40)
     */
    private $caract;

    /**
     * @var string
     *
     * @ORM\Column(name="perso", type="string", length=40)
     */
    private $perso;

    /**
     * @var integer
     *
     * @ORM\Column(name="valeur", type="smallint")
     */
    private $valeur;


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
     * Set caract
     *
     * @param string $caract
     * @return CaractPersoBundle
     */
    public function setCaract($caract)
    {
        $this->caract = $caract;
    
        return $this;
    }

    /**
     * Get caract
     *
     * @return string 
     */
    public function getCaract()
    {
        return $this->caract;
    }

    /**
     * Set perso
     *
     * @param string $perso
     * @return CaractPersoBundle
     */
    public function setPerso($perso)
    {
        $this->perso = $perso;
    
        return $this;
    }

    /**
     * Get perso
     *
     * @return string 
     */
    public function getPerso()
    {
        return $this->perso;
    }

    /**
     * Set valeur
     *
     * @param integer $valeur
     * @return CaractPersoBundle
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    
        return $this;
    }

    /**
     * Get valeur
     *
     * @return integer 
     */
    public function getValeur()
    {
        return $this->valeur;
    }
}
