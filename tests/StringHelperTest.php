<?php
use ignatenkovnikita\helpers\StringHelper;

/**
 * Created by PhpStorm.
 * User: Ignatenkov Nikita
 * Site: http://ignatenkovnikita.ru/
 * Date: 28.03.2016
 * Time: 18:55
 */
class StringHelperTest extends PHPUnit_Framework_TestCase
{

    public function testReplaceString(){
        $this->assertEquals(StringHelper::replaceSymbol('АЗ'), 'A3');
        $this->assertEquals(StringHelper::replaceSymbol('АЕНКМрхТСз'), 'AEHKMPXTC3');
    }

    public function testTruncateByPrefix(){
        $this->assertNotNull(StringHelper::truncateByPrefix(" abcdef", ['ab']));
        $this->assertNotNull(StringHelper::truncateByPrefix("a cbcdef ", ['ab', 'AC']));
        $this->assertNull(StringHelper::truncateByPrefix("ab  cdef", ['cd']));
        $this->assertNull(StringHelper::truncateByPrefix("abcdef", ['ef']));
        $this->assertNull(StringHelper::truncateByPrefix("abcdef", []));
        $this->assertNull(StringHelper::truncateByPrefix("", ['abcdef']));
    }



}