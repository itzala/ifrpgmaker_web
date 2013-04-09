<?php

namespace IfRPGMaker\HistoireBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IfRPGMaker\HistoireBundle\Entity\Description;
 
class LoadDescriptionData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $this->createDescription($manager, "Je vais regarder la télé");
        $this->createDescription($manager, "Je vais au vidéo-club");
        $this->createDescription($manager, "Je prends la fenêtre");
        $this->createDescription($manager, "Je prends la porte");
        
    }
    
    public function createDescription($manager, $contenu)
    {
        $description = new Description();
        
        $description->setContenu($contenu);
        
        $manager->persist($description);
        
        $manager->flush();
        
        $this->addReference("description".$description->getId(), $description);
    }   
    
   public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
?>
