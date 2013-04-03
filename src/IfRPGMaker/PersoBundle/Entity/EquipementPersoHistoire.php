<?php

namespace IfRPGMaker\PersoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EquipementPersoHistoire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\PersoBundle\Entity\EquipementPersoHistoireRepository")
 */
class EquipementPersoHistoire
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
     * @ORM\Column(name="personnage", type="string", length=40)
     */
    private $personnage;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=40)
     */
    private $objet;


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
     * Set personnage
     *
     * @param string $personnage
     * @return EquipementPersoHistoire
     */
    public function setPersonnage($personnage)
    {
        $this->personnage = $personnage;
    
        return $this;
    }

    /**
     * Get personnage
     *
     * @return string 
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }

    /**
     * Set objet
     *
     * @param string $objet
     * @return EquipementPersoHistoire
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
    
        return $this;
    }

    /**
     * Get objet
     *
     * @return string 
     */
    public function getObjet()
    {
        return $this->objet;
    }
}
