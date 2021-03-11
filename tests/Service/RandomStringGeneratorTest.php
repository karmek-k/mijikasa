<?php


namespace App\Tests\Service;


use App\Service\RandomStringGenerator;
use PHPUnit\Framework\TestCase;

class RandomStringGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $generator = new RandomStringGenerator();

        $shortString = $generator->generate(5);
        $longString = $generator->generate(50);
        $emptyString = $generator->generate(0);

        $this->assertEquals(5, strlen($shortString));
        $this->assertEquals(50, strlen($longString));
        $this->assertEquals(0, strlen($emptyString));

        $this->assertTrue(ctype_alnum($shortString));
        $this->assertTrue(ctype_alnum($longString));
        $this->assertFalse(ctype_alnum($emptyString));
    }

    public function testGenerateCustomCharacters()
    {
        $abcGenerator = new RandomStringGenerator(['a', 'b', 'c']);

        $abcString = $abcGenerator->generate(5);
        $emptyString = $abcGenerator->generate(0);

        $this->assertTrue((bool) preg_match('/[abc]{5}/', $abcString));
        $this->assertFalse((bool) preg_match('/[abc]{5}/', $emptyString));
    }
}