<?php

namespace App\EventSubscriber;

use App\Entity\Blogpost;
use App\Entity\Peinture;
use Doctrine\ORM\Mapping as ORM;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class EasyAdminSubscriber implements EventSubscriberInterface{

    /**
     * @ORM\Column(type="string")
     */
    private $slugger;
    private $security;

    public function __construct(SluggerInterface $slugger, Security $security){
        $this->slugger = $slugger;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return[
            BeforeEntityPersistedEvent::class => ['setDateAndUser'],
        ];
    }

    /**
     * @param mixed $slugger
     */
    public function setDateAndUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if  (($entity instanceof Blogpost)){
            $now = new \DateTimeImmutable('now');
            $entity->setCreatedAt($now);

            $user = $this->security->getUser();
            $entity->setUser($user);
        }
        if  (($entity instanceof Peinture)){
            $now = new \DateTimeImmutable('now');
            $entity->setCreatedAt($now);

            $user = $this->security->getUser();
            $entity->setUser($user);
        }
        Return;

//        $slug = $this->slugger->slug($entity->getTitre());
//        $entity->setSlug($slug);


    }
}