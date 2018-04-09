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
use Social\Entity\KeyboardBackBuilder;
use Longman\TelegramBot\Request;
/**
 * Start command
 *
 * Gets executed when a user first starts using the bot.
 */
class AvailableCommand extends AbstractCommand
{
  /**
   * @var string
   */
  protected $name = 'available';
  /**
   * @var string
   */
  protected $description = 'Available benefits command';
  /**
   * @var string
   */
  protected $usage = '/available';
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
    $conversation = $this->getConversation();
    $message = $this->getMessage();
    $chat_id = $message->getChat()->getId();

    $kyeboardBuilder = new KeyboardBackBuilder();
    $keyboard = $kyeboardBuilder->getKeyboard();

    $data = [
      'chat_id' => $chat_id,
      'text' => 'Раздел в разработке',
      'reply_markup'    => $keyboard,
    ];
    return Request::sendMessage($data);
  }
}