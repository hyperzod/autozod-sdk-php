<?php

namespace Hyperzod\AutozodSdkPhp\Service;

use Hyperzod\AutozodSdkPhp\Enums\HttpMethodEnum;

class TaskService extends AbstractService
{
   /**
    * List all task on autozod
    *
    * @param array $params
    *
    * @throws \Hyperzod\AutozodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function list(array $params)
   {
      return $this->request(HttpMethodEnum::GET, '/task/list', $params);
   }

   /**
    * Create a task on autozod
    *
    * @param array $params
    *
    * @throws \Hyperzod\AutozodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function create(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/task/create', $params);
   }

   /**
    * Update status of a task on autozod
    *
    * @param array $params
    *
    * @throws \Hyperzod\AutozodSdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function updateStatus(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/task/update/status', $params);
   }
}
