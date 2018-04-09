<?php
namespace Social\Entity;

use Social\CommandsList;
use Longman\TelegramBot\Entities\Keyboard;

class KeyboardBackBuilder extends AbstractKeyboardBuilder {
  public function __construct() {
    $this->keyboard = new Keyboard(
      [CommandsList::COMMANDS_GENERIC[CommandsList::HOME]]
    );

    $this->keyboard
      ->setResizeKeyboard(true)
      ->setSelective(false);
  }
}