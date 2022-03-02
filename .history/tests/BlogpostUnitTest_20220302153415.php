<?php

namespace App\Tests;

use DateTimeImmutable;
use App\Entity\Blogpost;
use PHPUnit\Framework\TestCase;

class BlogpostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogpost = new Blogpost();
        $datetime = new DateTimeImmutable();

        $blogpost->setTitre('nom')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug');

        $this->assertTrue($blogpost->getTitre() === 'nom');
        $this->assertTrue($blogpost->getCreatedAt() === $datetime);
        $this->assertTrue($blogpost->getContenu() === 'contenu');
        $this->assertTrue($blogpost->getSlug() === 'slug');
    }

    public function testIsfalse()
    {
        $blogpost = new Blogpost();
        $datetime = new DateTimeImmutable();

        $blogpost->setTitre('nom')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug');

        $this->assertFalse($blogpost->getTitre() === 'false');
        $this->assertFalse($blogpost->getCreatedAt() === new DateTimeImmutable);
        $this->assertFalse($blogpost->getContenu() === 'false');
        $this->assertFalse($blogpost->getSlug() === 'false');
    }
    public function testIsEmpty()
    {
        $blogpost = new Blogpost();

        $this->assertEmpty($blogpost->getTitre());
        $this->assertEmpty($blogpost->getCreatedAt());
        $this->assertEmpty($blogpost->getContenu());
        $this->assertEmpty($blogpost->getSlug());
    }
}
