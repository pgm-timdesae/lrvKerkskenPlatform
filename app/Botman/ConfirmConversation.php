<?php

namespace App\Botman;

use App\Models\EventUser;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Incoming\Answer;

class ConfirmConversation extends Conversation
{

  /*   public function confirmAppointment()
  {
    $user = $this->bot->userStorage()->find();

    $message = '-------------------------------------- <br>';
    $message .= 'Name : ' . $user->get('name') . '<br>';
    $message .= 'Email : ' . $user->get('email') . '<br>';
    $message .= 'Event : ' . $user->get('event') . '<br>';
    $message .= 'Time : ' . $user->get('time') . '<br>';
    $message .= '---------------------------------------';

    //$this->say('Super! Je bent nu ingeschreven. We zien je dan!<br><br>' . $message);
    $this->isItRight();
  }
 */
  public function isItRight()
  {
    $user = $this->bot->userStorage()->find();

    $this->say('Name : ' . $user->get('name') . '<br>');
    $this->say('Evenement : ' . $user->get('event') . '<br>');
    $this->say('Tijdslot : ' . $user->get('time') . '<br>');

    $question = Question::create('Is bovenstaande data juist?')
      ->addButtons([
        Button::create('yes')->value('yes'),
        Button::create('no')->value('no'),
      ]);

    $this->ask($question, function (Answer $answer) {
      if ($answer == 'yes') {
        $this->storeAppointment();
      } else {
        $this->bot->startConversation(new SelectTimeConversation());
      }
    });
  }

  public function storeAppointment()
  {
    $user = $this->bot->userStorage()->find();

    $userId = auth()->user()->id;

    EventUser::create([
      'event_id' => $user->get('event'),
      'user_id' => $userId,
      'time' => $user->get('time'),
    ]);

    $this->thanks();
  }

  public function thanks()
  {
    $this->say('Bedankt voor de inschrijving! We zien elkaar snel :)');
  }

  public function run()
  {
    // This will be called immediately
    $this->isItRight();
  }
}
