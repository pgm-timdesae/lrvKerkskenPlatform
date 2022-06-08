<?php

namespace App\Botman;

use App\Models\Event;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class SelectEventConversation extends Conversation
{


  /*   public function askService()
  {
    $question = Question::create('What kind of Service you are looking for?')
      ->callbackId('select_service')
      ->addButtons([
        Button::create('Hair')->value('Hair'),
        Button::create('Spa')->value('Spa'),
        Button::create('Beauty')->value('Beauty'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->bot->userStorage()->save([
          'service' => $answer->getValue(),
        ]);
      }
    });
  }
 */

  public function askService()
  {
    $events = Event::all();

    $question = Question::create('Voor welk evenement wil je inschrijven?')
      ->callbackId('select_event');

    foreach ($events as $event) {
      $question->addButtons([
        Button::create($event->name)->value($event->id),
      ]);
    }


    $this->ask($question, function (Answer $answer) {
      if ($answer->isInteractiveMessageReply()) {
        $this->bot->userStorage()->save([
          'event' => $answer->getValue(),
        ]);
      }

      $this->bot->startConversation(new SelectTimeConversation());
    });
  }

  public function run()
  {
    // This will be called immediately
    $this->askService();
  }
}
