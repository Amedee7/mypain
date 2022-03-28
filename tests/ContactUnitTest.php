<?php

namespace App\Tests;

use App\Entity\Contact;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $contact = new Contact();
        $datetime = new DateTimeImmutable();
        $contact->setNom('nom')
            ->setEmail('true@test.com')
            ->setMessage('message')
            ->setCreatedAt($datetime)
            ->setIsSend(true);

        $this->assertTrue($contact->getNom() === 'nom');
        $this->assertTrue($contact->getEmail() === 'true@test.com');
        $this->assertTrue($contact->getMessage() === 'message');
        $this->assertTrue($contact->getCreatedAt() === $datetime);
        $this->assertTrue($contact->getIsSend() === true);
    }

    public function testIsFalse()
    {
        $contact = new Contact();
        $datetime = new DateTimeImmutable();

        $contact->setNom('nom')
            ->setEmail('true@test.com')
            ->setMessage('message')
            ->setCreatedAt($datetime)
            ->setIsSend(true);

        $this->assertFalse($contact->getNom() === 'false');
        $this->assertFalse($contact->getEmail() === 'false@test.com');
        $this->assertFalse($contact->getMessage() === 'false');
        $this->assertFalse($contact->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($contact->getIsSend() === false);
    }

    public function testIsEmpty()
    {
        $contact = new Contact();

        $this->assertEmpty($contact->getNom());
        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getMessage());
        $this->assertEmpty($contact->getCreatedAt());
        $this->assertEmpty($contact->getIsSend());
        $this->assertEmpty($contact->getId());

    }

}
