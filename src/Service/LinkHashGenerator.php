<?php


namespace App\Service;


class LinkHashGenerator
{
    public function __construct(
        private RandomStringGenerator $stringGenerator,
        private HashAvailabilityChecker $checker,
    ) {}

    /**
     * Creates a new hash that has not been used before.
     *
     * @param int $minHashLength
     * @return string
     */
    public function generate(int $minHashLength = 5): string
    {
        do {
            // creates another hash if the generated one is not available
            $hash = $this->stringGenerator->generate($minHashLength);
            ++$minHashLength;
        } while (!$this->checker->checkAvailability($hash));

        return $hash;
    }
}