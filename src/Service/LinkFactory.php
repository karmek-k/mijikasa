<?php

namespace App\Service;

use App\Entity\Link;
use App\Repository\LinkRepository;

class LinkFactory
{
    public function __construct(
        private HashAvailabilityChecker $checker,
        private RandomStringGenerator $stringGenerator,
        private LinkRepository $repo,
    ) {}

    /**
     * Generates a Link entity (without persisting it)
     *
     * @param string $url
     * @param int $minHashLength
     * @return Link
     */
    public function createLink(string $url, int $minHashLength = 5): Link
    {
        // check if there is a need for creating a new link
        $link = $this->getLinkByUrl($url);
        if ($link !== null) {
            return $link;
        }

        // there is no such link
        do {
            // creates another hash if the generated one is not available
            $hash = $this->stringGenerator->generate($minHashLength);
            ++$minHashLength;
        } while (!$this->checker->checkAvailability($hash));

        $link = new Link($hash);
        $link->setUrl($url);

        return $link;
    }

    /**
     * Looks for a Link with the given URL.
     * Returns this Link if it's found, null otherwise.
     *
     * @param string $url
     * @return Link|null
     */
    private function getLinkByUrl(string $url): Link|null
    {
        return $this->repo->findOneBy(['url' => $url]);
    }
}