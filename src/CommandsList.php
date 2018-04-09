<?php
/**
 * Created by PhpStorm.
 * User: zelimhanhalidov
 * Date: 29/10/2017
 * Time: 17:16
 */

namespace Social;

class CommandsList {
  const ALL_BENEFITS = 'all';
  const AVAILABLE_BENEFITS = 'available';
  const HOME = 'start';

  const COMMANDS_GENERIC = [
    self::ALL_BENEFITS => 'Выбрать социальную льготу из списка',
    self::AVAILABLE_BENEFITS => 'Определить список доступных льгот',
    self::HOME => 'На главную',
  ];
}