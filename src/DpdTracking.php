<?php

namespace MichelMelo\Dpd;

use Exception;
use Goutte\Client;

class DpdTracking
{
    private $baseUrl = 'https://dpd.pt/track-and-trace';

    /**
     * @param array $refs
     * @return array
     */
    public function trackObjects(array $refs = [])
    {
        $returnArr   = [];
        $requestRefs = '';

        foreach ($refs as $idx => $ref) {
            $returnArr[$ref] = $this->makeRequest($ref);
        }

        return $returnArr;
    }

    /**
     * @param $statusCode
     * @return string
     */
    public static function getStatusString($statusCode)
    {
        $class     = new \ReflectionClass(__CLASS__);
        $constants = array_flip($class->getConstants());

        return $constants[$statusCode];
    }

    /**
     * @param $requestRefs
     * @return array
     */
    private function makeRequest($requestRefs)
    {
        $return = [];

        $client = new Client();
        $client->setServerParameter('HTTP_USER_AGENT', 'DpdTracking/1.0; https://michelmelo.pt');

        $res = $client->request('POST', $this->baseUrl . '?reference=' . $requestRefs, [
            'showResults' => true,
            'reference'   => $requestRefs,
        ]);

        $return = $res->filter('table > tbody')->filter('tr')->each(function ($tr, $i) {
            return $tr->filter('td')->each(function ($td, $i) {
                return trim($td->text());
            });
        });

        return $return;
    }

}
