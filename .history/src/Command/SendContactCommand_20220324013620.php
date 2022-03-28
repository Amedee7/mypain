<?php

namespace App\Command;


use App\Service\ContactService;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use Symfony\Component\Mime\Address;
use App\Repository\ContactRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendContactCommand extends Command
{
    private $contactRepository;
    private $mailer;
    private $contactService;
    private $userRepository;
    protected static $defaultName = 'app:send-contact';


    public function __construct(
        ContactRepository $contactRepository,
        MailerInterface $mailer,
        ContactService $contactService,
        UserRepository $userRepository
    ) {
        $this->contactRepository = $contactRepository;
        $this->contactService = $contactService;
        $this->userRepository = $userRepository;
        $this->mailer = $mailer;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $toSend = $this->contactRepository->findBy(['isSend' => false]);
        $adress = new Address(
            $this->userRepository->getPeintre()->getEmail(),
            $this->userRepository->getPeintre()->getNom() . ' ' . $this->userRepository->getPeintre()->getPrenom()
        );

        foreach ($toSend as $mail) {
            $email = (new Email())
                ->from($mail->getEmail())
                ->to($adress)
                ->subject('Nouveau messa de ' . $mail->getNom())
                ->text($mail->getMessage());

            $this->mailer->send($email);

            $this->contactService->isSend($mail);
        }
        return Command::SUCCESS;
    }
}
