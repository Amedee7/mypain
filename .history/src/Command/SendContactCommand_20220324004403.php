<?php
namespace App\Command;


use Symfony\Component\Mailer\MailerInterface;

class SendContactCommand extends Command{
    private $contactRepository;
    private $mailer;
    private $contactService;
    private $userRepository;
    protected static $defaultName = 'app:send-contact':


    public function __construct(
        ContactRepository $contactRepository,
        MailerInterface $mailer,
        ContactService $contactService,
        UserRepository $userRepository
    ){
        $this->contactRepository = $contact;
        $this->contactService = $contactService;
        $this->userRepository = $user;
        $this->mailer = $mailer;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $toSend = $this->contactRepository->findBy(['isSend' => false]);
        $adress = new Address($this->userRepository->getPeintre()->getEmail(), this->userRepository->getPeintre()->getNom() . '')

        foreach ($toSend as $mail) {
                $email = (new Email())
                    ->from($mail->getEmail)
                    ->to($adress)
                    ->subject('Nouveau messa de ' . $mail->getNom())
                    ->text($mail->getMessage());
        }
    }
}