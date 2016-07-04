<?php
namespace App\Router;

class Bot
{
    private static $bots = array();
    private static $botsFile = '/resources/request/bots.txt';

    private static function getBots()
    {
        if (self::$bots) {
            return self::$bots;
        }

        return self::$bots = file(APP_BASE_PATH.self::$botsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    public static function isBot(array $data = array())
    {
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
            return true;
        }

        foreach (self::getBots() as $bot) {
            if (preg_match('#'.preg_quote($bot, '#').'#', $_SERVER['HTTP_USER_AGENT'])) {
                return true;
            }
        }
    }
}
