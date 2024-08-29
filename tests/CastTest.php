<?php

declare(strict_types=1);

namespace Xactsystems\Tests;

use PHPUnit\Framework\TestCase;
use Xactsystems\Cast\Cast;

class CastTest extends TestCase
{
    public function testNullInt(): void
    {
        $null = Cast::nullInt(null);

        $this->assertNull($null);
    }

    public function testNullFloat(): void
    {
        $null = Cast::nullFloat(null);

        $this->assertNull($null);
    }

    public function testNullString(): void
    {
        $null = Cast::nullString(null);

        $this->assertNull($null);
    }

    public function testNullBool(): void
    {
        $null = Cast::nullBool(null);

        $this->assertNull($null);
    }

    public function testNullArray(): void
    {
        $null = Cast::nullArray(null);

        $this->assertNull($null);
    }

    public function testNullObject(): void
    {
        $null = Cast::nullObject(null);

        $this->assertNull($null);
    }

    public function testNullDateTime(): void
    {
        $null = Cast::nullDateTime(null);

        $this->assertNull($null);
    }

    public function testIntval(): void
    {
        $null = Cast::intval(null);
        $array0 = Cast::intval([]);
        $array1 = Cast::intval([99]);
        $bool = Cast::intval(true);
        $int = Cast::intval(99);
        $float = Cast::intval(99.99);
        $string1 = Cast::intval('1234');
        $string2 = Cast::intval('ABC1');
        $streamHandle = fopen("php://memory", "rw");
        $stream = Cast::intval($streamHandle);
        fclose($streamHandle);

        $this->assertEquals(0, $null);
        $this->assertEquals(0, $array0);
        $this->assertEquals(1, $array1);
        $this->assertEquals(1, $bool);
        $this->assertEquals(99, $int);
        $this->assertEquals(99, $float);
        $this->assertEquals(1234, $string1);
        $this->assertEquals(0, $string2);
        $this->assertIsInt($stream);
    }

    public function testFloatval(): void
    {
        $null = Cast::floatval(null);
        $array0 = Cast::floatval([]);
        $array1 = Cast::floatval([99]);
        $int = Cast::floatval(99);
        $float = Cast::floatval(99.99);
        $string1 = Cast::floatval('1234');
        $string2 = Cast::floatval('ABC1');

        $this->assertEquals(0.0, $null);
        $this->assertEquals(0.0, $array0);
        $this->assertEquals(1.0, $array1);
        $this->assertEquals(99.00, $int);
        $this->assertEquals(99.99, $float);
        $this->assertEquals(1234.0, $string1);
        $this->assertEquals(0.0, $string2);
    }

    public function testStrval(): void
    {
        $bool = Cast::strval(true);
        $int = Cast::strval(99);
        $float = Cast::strval(99.99);
        $string1 = Cast::strval('1234');
        $streamHandle = fopen("php://memory", "rw");
        $stream = Cast::strval($streamHandle);
        fclose($streamHandle);

        $this->assertEquals('1', $bool);
        $this->assertEquals('99', $int);
        $this->assertEquals('99.99', $float);
        $this->assertEquals('1234', $string1);
        $this->assertIsString($stream);
    }

    public function testBoolval(): void
    {
        $bool = Cast::boolval(false);
        $int = Cast::boolval(0);
        $float = Cast::boolval(99.99);
        $string1 = Cast::boolval('1234');

        $this->assertEquals(false, $bool);
        $this->assertEquals(false, $int);
        $this->assertEquals(true, $float);
        $this->assertEquals(true, $string1);
    }
}
