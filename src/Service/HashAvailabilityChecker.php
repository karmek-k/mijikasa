<?php


namespace App\Service;


use App\Repository\LinkRepository;

class HashAvailabilityChecker
{
    public function __construct(private LinkRepository $linkRepo) {}

    /**
     * Checks if the given hash can be used as a PK
     * (there is no such hash in the database)
     *
     * @param string $hash
     * @return bool
     */
    public function checkAvailability(string $hash): bool
    {
        return $this->linkRepo->find($hash) === null;
    }
}