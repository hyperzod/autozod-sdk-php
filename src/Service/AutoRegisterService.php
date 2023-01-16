<?php

namespace Hyperzod\AutozodSdkPhp\Service;

use Hyperzod\AutozodSdkPhp\Enums\HttpMethodEnum;

class AutoRegisterService extends AbstractService
{
   /**
    * Auto register a user on autozod
    *
    * @param array $params
    *
    * @throws \Hyperzod\AutozodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function autoRegister(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/autoRegister', $params);
   }
}
