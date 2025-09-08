<?php

namespace Hyperzod\AutozodSdkPhp\Service;

use Hyperzod\AutozodSdkPhp\Enums\HttpMethodEnum;

class GeocodeService extends AbstractService
{
   /**
    * Geocode an address
    *
    * @param array $params
    *
    * @throws \Hyperzod\AutozodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function geocodeAddress(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/geocode', $params);
   }
}
