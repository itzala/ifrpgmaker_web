<?php

namespace IfRPGMaker\HistoireBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IfRPGMaker\HistoireBundle\Entity\Evenement;
 
class LoadEvenementData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $intro = $this->getReference("intro1");
        $description = $this->getReference("description2");
        $this->createEvenement($manager, $intro, $description);
        $intro = $this->getReference("intro3");
        $description = $this->getReference("description4");
        $this->createEvenement($manager, $intro, $description);
        $intro = $this->getReference("intro2");
        $description = $this->getReference("description1");
        $this->createEvenement($manager, $intro, $description);
        
        $manager->flush();
    }
    
    public function createEvenement($manager, $intro, $description)
    {
        $evenement = new Evenement($intro, $description);
        
        $manager->persist($evenement);
        
    }   
    
   public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
?>
