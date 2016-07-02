<?php
namespace App\Template;

class Html
{
    public static function entities($html)
    {
        return htmlentities($html, ENT_QUOTES | ENT_IGNORE, 'UTF-8');
    }
}
