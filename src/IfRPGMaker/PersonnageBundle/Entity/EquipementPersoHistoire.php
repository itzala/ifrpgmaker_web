<?php

namespace IfRPGMaker\PersonnageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EquipementPersoHistoire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IfRPGMaker\PersonnageBundle\Entity\EquipementPersoHistoireRepository")
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
     *
     * @ORM\ManyToOne(targetEntity="IfRPGMaker\SystemeJeuBundle\Entity\Objet")
     */
    private $objet;
    
    
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
     * Set objet
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\Objet $objet
     * @return EquipementPersoHistoire
     */
    public function setObjet(\IfRPGMaker\SystemeJeuBundle\Entity\Objet $objet = null)
    {
        $this->objet = $objet;
    
        return $this;
    }

    /**
     * Get objet
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\Objet 
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set perso
     *
     * @param \IfRPGMaker\SystemeJeuBundle\Entity\Personnage $perso
     * @return EquipementPersoHistoire
     */
    public function setPerso(\IfRPGMaker\SystemeJeuBundle\Entity\Personnage $perso = null)
    {
        $this->perso = $perso;
    
        return $this;
    }

    /**
     * Get perso
     *
     * @return \IfRPGMaker\SystemeJeuBundle\Entity\Personnage 
     */
    public function getPerso()
    {
        return $this->perso;
    }
}