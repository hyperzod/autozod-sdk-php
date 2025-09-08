<?php

namespace Hyperzod\AutozodSdkPhp\Service;

use Hyperzod\AutozodSdkPhp\Enums\HttpMethodEnum;

class WebhookService extends AbstractService
{
   /**
    * Create a webhook on autozod
    *
    * @param array $params
    *
    * @throws \Hyperzod\AutozodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function create(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/webhooks', $params);
   }
}
