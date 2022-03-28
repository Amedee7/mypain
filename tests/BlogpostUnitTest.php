<?php

namespace App\Tests;

use App\Entity\Commentaire;
use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Blogpost;
use PHPUnit\Framework\TestCase;

class BlogpostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogpost = new Blogpost();
        $datetime = new DateTimeImmutable();
        $user = new User();

        $blogpost->setTitre('nom')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug')
            ->setUser($user);

        $this->assertTrue($blogpost->getTitre() === 'nom');
        $this->assertTrue($blogpost->getCreatedAt() === $datetime);
        $this->assertTrue($blogpost->getContenu() === 'contenu');
        $this->assertTrue($blogpost->getSlug() === 'slug');
        $this->assertTrue($blogpost->getUser()===$user);
    }

    public function testIsFalse()
    {
        $blogpost = new Blogpost();
        $datetime = new DateTimeImmutable();
        $user = new User();

        $blogpost->setTitre('nom')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug')
            ->setUser($user);

        $this->assertFalse($blogpost->getTitre() === 'false');
        $this->assertFalse($blogpost->getCreatedAt() === new DateTimeImmutable);
        $this->assertFalse($blogpost->getContenu() === 'false');
        $this->assertFalse($blogpost->getSlug() === 'false');
        $this->assertFalse($blogpost->getUser()=== new User());
    }
    public function testIsEmpty()
    {
        $blogpost = new Blogpost();

        $this->assertEmpty($blogpost->getTitre());
        $this->assertEmpty($blogpost->getCreatedAt());
        $this->assertEmpty($blogpost->getContenu());
        $this->assertEmpty($blogpost->getSlug());
        $this->assertEmpty($blogpost->getId());
    }

    public function testAddGetRemoveCommentaire(){
        $blogpost = new Blogpost();
        $commentaire = new Commentaire();

        $this->assertEmpty($blogpost->getCommentaires());

        $blogpost->addCommentaire($commentaire);
        $this->assertContains($commentaire, $blogpost->getCommentaires());

        $blogpost->removeCommentaire($commentaire);
        $this->assertEmpty ($blogpost->getCommentaires());
    }
}
