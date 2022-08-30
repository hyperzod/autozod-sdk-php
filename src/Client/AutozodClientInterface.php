<?php

namespace Hyperzod\AutozodSdkPhp\Client;

/**
 * Interface for a Autozod client.
 */
interface AutozodClientInterface extends BaseAutozodClientInterface
{
   /**
    * Sends a request to Autozod's API.
    *
    * @param string $method the HTTP method
    * @param string $path the path of the request
    * @param array $params the parameters of the request
    */
   public function request($method, $path, $params);
}
