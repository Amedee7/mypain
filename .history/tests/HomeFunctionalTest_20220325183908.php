<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeFunctionalTest extends PantherTestCase
{
    public function testDisplayHomepage(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

        $this->assertSelectorTextContains('h1', 'Amedee ODG');
        $this->assertSelectorTextContains('p', 'Artiste rapeur a Ouagadougou');
    }
}
