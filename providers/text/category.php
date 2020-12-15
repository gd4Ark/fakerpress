<?php

namespace Faker\Provider;

class Category extends TextBase
{
    public static $wordList = null;

    public static function getWordList()
    {
        if (self::$wordList) {
            return self::$wordList;
        }

        $categories = include __DIR__ . '/../../mock/category.php';

        if (is_array($categories)) {
            self::$wordList = $categories;
        } else {
            self::$wordList = [];
        }

        return self::$wordList;
    }

    public static function word()
    {

        $wordList = self::getWordList();

        return static::randomElement($wordList);
    }
}
