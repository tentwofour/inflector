<?php

namespace Ten24\Tests\Component\Inflector;

use PHPUnit\Framework\TestCase;
use Ten24\Component\Inflector\Inflector;

/**
 * Class InflectorTest
 *
 * @package Ten24\Tests\Component\Inflector
 */
class InflectorTest extends TestCase
{
    public function testCamelCaseToLowerCaseWords()
    {
        $res = Inflector::camelCaseToLowerCaseWords('camelCaseWordWith1Number');
        $expected = 'camel case word with 1 number';
        self::assertEquals($expected, $res);

        $res = Inflector::camelCaseToLowerCaseWords('camelCaseWordWith1Number&SpecialChar');
        $expected = 'camel case word with 1 number & special char';
        self::assertEquals($expected, $res);
    }

    public function testCamelCaseToSentenceCasedWords()
    {
        $res = Inflector::camelCaseToSentenceCaseWords('camelCaseWordWith1Number');
        $expected = 'Camel case word with 1 number';
        self::assertEquals($expected, $res);

        $res = Inflector::camelCaseToSentenceCaseWords('camelCaseWordWith1Number&SpecialChar');
        $expected = 'Camel case word with 1 number & special char';
        self::assertEquals($expected, $res);
    }

    public function testCamelCaseToCapitalizedWords()
    {
        $res = Inflector::camelCaseToCapitalizedWords('camelCaseWordWith1Number');
        $expected = 'Camel Case Word With 1 Number';
        self::assertEquals($expected, $res);

        $res = Inflector::camelCaseToCapitalizedWords('camelCaseWordWith1Number&SpecialChar');
        $expected = 'Camel Case Word With 1 Number & Special Char';
        self::assertEquals($expected, $res);
    }

    public function testCamelCaseToWords()
    {
        $res = Inflector::camelCaseToWords('camelCaseWordWith1Number');
        $expected = 'camel Case Word With 1 Number';
        self::assertEquals($expected, $res);

        $res = Inflector::camelCaseToWords('camelCaseWordWith1Number&SpecialChar');
        $expected = 'camel Case Word With 1 Number & Special Char';
        self::assertEquals($expected, $res);
    }
}