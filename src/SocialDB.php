<?php
namespace Social;

use Longman\TelegramBot\DB;
use function PHPSTORM_META\type;

class SocialDB extends DB
{
  public static function createItem($params) {
    $userId = (int) $params['userId'];
    $photoPath = $params['photoPath'];
    $fileId = $params['fileId'];
    $description = $params['description'];

    $st = self::$pdo->prepare("INSERT INTO item (user_id, photo_path, file_id, description) VALUES(?,?,?,?)");
    $st = $st->execute([$userId, $photoPath, $fileId, $description]);
    return self::$pdo->lastInsertId();
  }
}
