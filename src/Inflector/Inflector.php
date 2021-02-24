<?php

namespace Ten24\Component\Inflector;

use RuntimeException;

/**
 * Class Inflector
 *
 * @package Ten24\Component\Inflector
 */
class Inflector
{
    /**
     * @param string $string
     *
     * @return string
     */
    static public function camelCaseToLowerCaseWords(string $string): string
    {
        return strtolower(self::camelCaseToWords($string));
    }

    /**
     * @param string $string
     *
     * @return string
     */
    static public function camelCaseToSentenceCaseWords(string $string): string
    {
        return ucfirst(strtolower(self::camelCaseToWords($string)));
    }

    /**
     * @param string $string
     *
     * @return string
     */
    static public function camelCaseToCapitalizedWords(string $string): string
    {
        return ucwords(self::camelCaseToWords($string));
    }

    /**
     * @param string $string
     *
     * @return string
     */
    static public function camelCaseToWords($string): string
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

    /**
     * Converts camelCase to camel_case
     * This doesn't strip special characters or punctuation.
     *
     * @param string $string
     *
     * @return string
     */
    static public function camelCaseToSnakeCase(string $string): string
    {
        $converted = preg_replace('~(?<=[\\w[:punct:]&])([[:upper:][:digit:][:punct:]&])~u', '_$1', $string);

        if ($converted === null) {
            throw new RuntimeException(sprintf(
                'preg_replace returned null for value "%s"',
                $string
            ));
        }

        return mb_strtolower($converted);
    }

    /**
     * Converts 'a_word' to 'TableName'.
     *
     * @param string $string
     *
     * @return string
     */
    static public function snakeCaseToUpperCamelCase(string $string) : string
    {
        return ucfirst(static::snakeCaseToCamelCase($string));
    }


    /**
     * Converts 'a_word' to 'TableName'.
     *
     * @param string $string
     *
     * @return string
     */
    static public function snakeCaseToCamelCase(string $string) : string
    {
        return str_replace([' ', '_', '-'], '', lcfirst(ucwords(strtolower($string), '_')));
    }

}