<?php
/**
 * Created by PhpStorm.
 * User: Ignatenkov Nikita
 * Site: http://ignatenkovnikita.ru/
 * Date: 28.03.2016
 * Time: 17:54
 */

namespace ignatenkovnikita\helpers;


class StringHelper extends \yii\helpers\StringHelper
{

    /**
     * Default symbol for replace
     * @var array
     */
    public static $transliteration = [
        'А' => 'A',
        'Е' => 'E',
        'Н' => 'H',
        'К' => 'K',
        'М' => 'M',
        'Р' => 'P',
        'Х' => 'X',
        'Т' => 'T',
        'С' => 'C',
        'З' => '3',

    ];

    /**
     * Function replace symbol
     * @param $string
     * @param null $transliteration
     * @return string
     */
    public static function replaceSymbol($string, $transliteration = null)
    {
        if ($transliteration == null) {
            $transliteration = static::$transliteration;
        }

        $string = str_replace(' ', '', $string);
        $string = mb_strtoupper($string);

        return str_replace(array_keys($transliteration), $transliteration, $string);
    }

    /**
     * Function get string by prefix or null if prefix not exist
     * @param $string
     * @param array $prefix
     * @return null|string
     */
    public static function truncateByPrefix($string, array $prefix){
        $string = str_replace(' ', '', $string);
        $string = mb_strtoupper($string);
        foreach ($prefix as $item) {
            $item = str_replace(' ', '', $item);
            $item = mb_strtoupper($item);
            if(self::startsWith($string, $item)){
                return trim(ltrim($string, $item));
            }
        }
        return null;
    }



}