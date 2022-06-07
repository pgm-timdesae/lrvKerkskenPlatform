<?php

namespace App\Botman;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Validator;

class OnboardingConversation extends Conversation
{
  protected $name;

  protected $email;

  protected $query;

  public function askName()
  {
    $this->ask('Hi! What is your name?', function (Answer $answer) {
      // Save result
      $this->bot->userStorage()->save([
        'name' => $answer->getText(),
      ]);

      $this->say('Leuk je te ontmoeten ' . $this->name);
      $this->askEmail();
    });
  }

  public function askEmail()
  {
    $this->ask('Wat is jouw e-mailadres?', function (Answer $answer) {
      // Save result
      $validator = Validator::make(['email' => $answer->getText()], [
        'email' => 'email',
      ]);

      if ($validator->fails()) {
        return $this->repeat('Oeps.. dit is geen geldig e-mailadress. Probeer het nogmaals.');
      }

      $this->bot->userStorage()->save([
        'email' => $answer->getText(),
      ]);

      $this->bot->startConversation(new SelectEventConversation());
    });
  }

  public function run()
  {
    // This will be called immediately
    $this->askName();
  }
}
