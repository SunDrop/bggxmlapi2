<?php
namespace Nataniel\BoardGameGeek;

/**
 * Class Client
 * @package Main\Services\BoardGameGeek
 * https://boardgamegeek.com/wiki/page/BGG_XML_API2
 */
class Client
{
    const API_URL = 'https://www.boardgamegeek.com/xmlapi2';

    /**
     * @param  int $id
     * @param  bool $stats
     * @return Thing
     * @throws Exception
     */
    public function getThing($id, $stats)
    {
        $filename = sprintf('/thing?id=%d&stats=%d', $id, $stats);
        $xml = simplexml_load_file($filename);
        if (!$xml instanceof \SimpleXMLElement) {
            throw new Exception('API call failed');
        }

        return new Thing($xml);
    }

    public function getUser($name)
    {
        $filename = sprintf('/user?name=%s', $name);
        $xml = simplexml_load_file($filename);
        if (!$xml instanceof \SimpleXMLElement) {
            throw new Exception('API call failed');
        }

        return new User($xml);
    }
}