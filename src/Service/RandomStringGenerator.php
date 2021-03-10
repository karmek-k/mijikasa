<?php


namespace App\Service;


use JetBrains\PhpStorm\Pure;

class RandomStringGenerator
{
    private array $characters;

    /**
     * RandomStringGenerator constructor.
     * By default, RandomStringGenerator uses only alphanumeric characters.
     *
     * @param array|null $customCharacters Specify if you want to use custom characters in the random string.
     */
    #[Pure]
    public function __construct(array $customCharacters = null)
    {
        if ($customCharacters === null) {
            $this->characters = array_merge(
                range('0', '9'),
                range('A', 'Z'),
                range('a', 'z'),
            );
        } else {
            $this->characters = $customCharacters;
        }
    }

    /**
     * Generates a random string of given length.
     *
     * @param int $length Length of the string.
     * @return string
     */
    public function generate(int $length): string
    {
        $result = [];

        for ($i = 0; $i < $length; ++$i) {
            $result[] = $this->characters[array_rand($this->characters)];
        }

        return implode($result);
    }
}