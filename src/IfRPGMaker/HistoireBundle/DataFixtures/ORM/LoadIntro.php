<?php

namespace IfRPGMaker\HistoireBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IfRPGMaker\HistoireBundle\Entity\Intro;
 
class LoadIntroData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $this->createIntro($manager, "Je vais regarder la télé");
        $this->createIntro($manager, "Je vais au vidéo-club");
        $this->createIntro($manager, "Je prends la fenêtre");
        $this->createIntro($manager, "Je prends la porte");
    }
    
    public function createIntro($manager, $contenu)
    {
        $intro = new Intro();
        
        $intro->setContenu($contenu);
        
        $manager->persist($intro);
        
        $manager->flush();
        
        echo $intro->getId();
        
        $this->addReference("intro".$intro->getId(), $intro);
    }   
    
   public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
?>
