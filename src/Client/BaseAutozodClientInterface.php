<?php

namespace Hyperzod\AutozodSdkPhp\Client;

/**
 * Interface for a Autozod client.
 */
interface BaseAutozodClientInterface
{
   /**
    * Gets the API key used by the client to send requests.
    *
    * @return null|string the API key used by the client to send requests
    */
   public function getApiKey();

   /**
    * Gets the base URL for Autozod's API.
    *
    * @return string the base URL for Autozod's API
    */
   public function getApiBase();
}
