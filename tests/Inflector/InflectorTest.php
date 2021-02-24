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
        $res      = Inflector::camelCaseToLowerCaseWords('camelCaseWordWith1Number');
        $expected = 'camel case word with 1 number';
        self::assertEquals($expected, $res);

        $res      = Inflector::camelCaseToLowerCaseWords('camelCaseWordWith1Number&SpecialChar');
        $expected = 'camel case word with 1 number & special char';
        self::assertEquals($expected, $res);
    }

    public function testCamelCaseToSentenceCasedWords()
    {
        $res      = Inflector::camelCaseToSentenceCaseWords('camelCaseWordWith1Number');
        $expected = 'Camel case word with 1 number';
        self::assertEquals($expected, $res);

        $res      = Inflector::camelCaseToSentenceCaseWords('camelCaseWordWith1Number&SpecialChar');
        $expected = 'Camel case word with 1 number & special char';
        self::assertEquals($expected, $res);
    }

    public function testCamelCaseToCapitalizedWords()
    {
        $res      = Inflector::camelCaseToCapitalizedWords('camelCaseWordWith1Number');
        $expected = 'Camel Case Word With 1 Number';
        self::assertEquals($expected, $res);

        $res      = Inflector::camelCaseToCapitalizedWords('camelCaseWordWith1Number&SpecialChar');
        $expected = 'Camel Case Word With 1 Number & Special Char';
        self::assertEquals($expected, $res);
    }

    public function testCamelCaseToWords()
    {
        $res      = Inflector::camelCaseToWords('camelCaseWordWith1Number');
        $expected = 'camel Case Word With 1 Number';
        self::assertEquals($expected, $res);

        $res      = Inflector::camelCaseToWords('camelCaseWordWith1Number&SpecialChar');
        $expected = 'camel Case Word With 1 Number & Special Char';
        self::assertEquals($expected, $res);
    }

    public function testCamelCaseToSnakeCase()
    {
        $res      = Inflector::camelCaseToSnakeCase('camelCaseWordWith1Number');
        $expected = 'camel_case_word_with_1_number';
        self::assertEquals($expected, $res, $res);

        $res      = Inflector::camelCaseToSnakeCase('CamelCaseWordWith1Number');
        $expected = 'camel_case_word_with_1_number';
        self::assertEquals($expected, $res, $res);

        $res      = Inflector::camelCaseToSnakeCase('camelCaseWordWith1Number&SpecialChar');
        $expected = 'camel_case_word_with_1_number_&_special_char';
        self::assertEquals($expected, $res);

        $res      = Inflector::camelCaseToSnakeCase('camelCaseWordWith1Number!SpecialChar');
        $expected = 'camel_case_word_with_1_number_!_special_char';
        self::assertEquals($expected, $res, $res);

        $res      = Inflector::camelCaseToSnakeCase(' ');
        $expected = ' ';
        self::assertEquals($expected, $res, $res);

        $res      = Inflector::camelCaseToSnakeCase('AaaA');
        $expected = 'aaa_a';
        self::assertEquals($expected, $res, $res);
    }

    public function testSnakeCaseToUpperCamelCase() {
        $res      = Inflector::snakeCaseToUpperCamelCase('camel_case_word_with_1_number');
        $expected = 'CamelCaseWordWith1Number';
        self::assertEquals($expected, $res, $res);

        $res      = Inflector::snakeCaseToUpperCamelCase('camel_case_word_with 1_number');
        $expected = 'CamelCaseWordWith1Number';
        self::assertEquals($expected, $res, $res);

        $res      = Inflector::snakeCaseToUpperCamelCase('Camel_cAse_woRd_with-1_number');
        $expected = 'CamelCaseWordWith1Number';
        self::assertEquals($expected, $res, $res);
    }

    public function testSnakeCaseToCamelCase() {
        $res      = Inflector::snakeCaseToCamelCase('camel_case_word_with_1_number');
        $expected = 'camelCaseWordWith1Number';
        self::assertEquals($expected, $res, $res);

        $res      = Inflector::snakeCaseToCamelCase('camel_case_word_with 1_number');
        $expected = 'camelCaseWordWith1Number';
        self::assertEquals($expected, $res, $res);

        $res      = Inflector::snakeCaseToCamelCase('Camel_cAse_woRd_with-1_number');
        $expected = 'camelCaseWordWith1Number';
        self::assertEquals($expected, $res, $res);
    }

}