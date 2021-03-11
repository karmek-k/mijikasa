<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testErrorWhenEnteringInvalidUrl()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $form = $crawler->selectButton('Shorten!')->form();
        $form['link[url]'] = 'aaaaa';
        $crawler = $client->submit($form);

        $this->assertGreaterThan(0, $crawler->filter('.url-errors li')->count());
    }

    public function testErrorWhenEnteringEmptyUrl()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $form = $crawler->selectButton('Shorten!')->form();
        $form['link[url]'] = '';
        $crawler = $client->submit($form);

        $this->assertGreaterThan(0, $crawler->filter('.url-errors li')->count());
    }
}