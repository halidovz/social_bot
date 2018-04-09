<?php
namespace Social\Entity;

use Social\CommandsList;
use Longman\TelegramBot\Entities\Keyboard;

class KeyboardMainBuilder extends AbstractKeyboardBuilder {
  public function __construct() {
    $this->keyboard = new Keyboard(
      [CommandsList::COMMANDS_GENERIC[CommandsList::ALL_BENEFITS]],
      [CommandsList::COMMANDS_GENERIC[CommandsList::AVAILABLE_BENEFITS]]
    );

    $this->keyboard
      ->setResizeKeyboard(true)
      ->setSelective(false);
  }
}