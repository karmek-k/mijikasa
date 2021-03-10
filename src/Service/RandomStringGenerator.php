<?php


namespace App\Service;


use JetBrains\PhpStorm\Pure;

class RandomStringGenerator
{
    private array $characters;

    /**
     * RandomStringGenerator constructor.
     * @param array|null $customCharacters Specify if you want to use custom characters in the random string.
     */
    #[Pure]
    public function __construct(array $customCharacters = null)
    {
        if ($customCharacters === null) {
            $this->characters = array_merge(range('A', 'z'));
        } else {
            $this->characters = $customCharacters;
        }
    }

    /**
     * Generates a random string of given legth.
     *
     * @param int $length Length of the string.
     * @return string
     */
    #[Pure]
    public function generate(int $length = 10): string
    {
        $result = array_rand($this->characters, $length);

        return implode($result);
    }
}