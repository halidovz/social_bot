<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Longman\TelegramBot\Commands\SystemCommands;
use Social\AbstractClasses\Commands\AbstractCommand;
use Social\CommandsList;
use Longman\TelegramBot\Request;

/**
 * Generic command
 *
 * Gets executed for generic commands, when no other appropriate one is found.
 */
class GenericMessageCommand extends AbstractCommand
{
  /**
   * @var string
   */
  protected $name = 'genericmessage';
  /**
   * @var string
   */
  protected $description = 'Handles generic commands or is executed by default when a command is not found';
  /**
   * @var string
   */
  protected $version = '1.1.0';
  /**
   * Command execute method
   *
   * @return \Longman\TelegramBot\Entities\ServerResponse
   * @throws \Longman\TelegramBot\Exception\TelegramException
   */
  public function execute()
  {
    $message = $this->getMessage();

    switch ($message->getText()) {
      case CommandsList::COMMANDS_GENERIC[CommandsList::ALL_BENEFITS]:
        return $this->telegram->executeCommand(CommandsList::ALL_BENEFITS);
        break;

      case CommandsList::COMMANDS_GENERIC[CommandsList::AVAILABLE_BENEFITS]:
        return $this->telegram->executeCommand(CommandsList::AVAILABLE_BENEFITS);
        break;

      case CommandsList::COMMANDS_GENERIC[CommandsList::HOME]:
        return $this->telegram->executeCommand(CommandsList::HOME);
        break;
    }

    $conversation = $this->getConversation();
    if ($conversation->exists() && ($command = $conversation->getCommand())) {
      return $this->telegram->executeCommand($command);
    }

    return $this->telegram->executeCommand('start');
  }
}