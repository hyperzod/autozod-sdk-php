<?php

namespace Hyperzod\AutozodSdkPhp\Service;

use Hyperzod\AutozodSdkPhp\Enums\HttpMethodEnum;

class AutoLoginService extends AbstractService
{
   /**
    * Auto login a user on autozod
    *
    * @param array $params
    *
    * @throws \Hyperzod\AutozodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function autoLogin(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/autoLogin', $params);
   }
}
