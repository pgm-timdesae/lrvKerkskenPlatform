<?php

namespace App\Botman;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class SelectTimeConversation extends Conversation
{

  public function askTime()
  {
    $question = Question::create('Selecteer een tijdslot')
      ->callbackId('select_time')
      ->addButtons([
        Button::create('Tijdslot 1: 18u00 - 18u30')->value('one'),
        Button::create('Tijdslot 2: 18u30 - 19u00')->value('two'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->bot->userStorage()->save([
          'time' => $answer->getValue(),
        ]);
      }

      $this->bot->startConversation(new ConfirmConversation());
    });
  }

  public function run()
  {
    // This will be called immediately
    $this->askTime();
  }
}
