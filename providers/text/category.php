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

        $data = null;

        $customPath = self::getCustomFakePath() . '/category.php';

        if (file_exists($customPath)) {
            $data = include $customPath;
        } else {
            $data = include __DIR__ . '/../../mock/category.php';
        }

        self::$wordList = is_array($data) ? $data : [];

        return self::$wordList;
    }

    public static function word()
    {

        $wordList = self::getWordList();

        return static::randomElement($wordList);
    }
}
