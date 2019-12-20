<?php

namespace Ten24\Component\Inflector;

/**
 * Class Inflector
 *
 * @package Ten24\Component\Inflector
 */
class Inflector
{
    /**
     * @param $string
     *
     * @return string
     */
    static public function camelCaseToLowerCaseWords($string)
    {
        return strtolower(self::camelCaseToWords($string));
    }

    /**
     * @param $string
     *
     * @return string
     */
    static public function camelCaseToSentenceCaseWords($string)
    {
        return ucfirst(strtolower(self::camelCaseToWords($string)));
    }

    /**
     * @param $string
     *
     * @return string
     */
    static public function camelCaseToCapitalizedWords($string)
    {
        return ucwords(self::camelCaseToWords($string));
    }

    /**
     * @param $string
     *
     * @return string
     */
    static public function camelCaseToWords($string)
    {
        return preg_replace(
            [
                '~(?<=\\w)([A-Z,1-9])~',
                '~([&])~',
            ],
            [
                ' $1',
                ' $1 ',
            ]
            , $string);
    }
}