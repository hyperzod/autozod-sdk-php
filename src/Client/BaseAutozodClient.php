<?php

namespace Hyperzod\AutozodSdkPhp\Client;

use GuzzleHttp\Client;
use Hyperzod\AutozodSdkPhp\Enums\EnvironmentEnum;
use Hyperzod\AutozodSdkPhp\Exception\InvalidArgumentException;

class BaseAutozodClient implements AutozodClientInterface
{

   /** @var string default base URL for Autozod's API */
   const DEV_API_BASE = 'https://www.autozod.dev/api';

   const PRODUCTION_API_BASE = 'https://www.autozod.app/api';

   /** @var array<string, mixed> */
   private $config;

   /**
    * Initializes a new instance of the {@link BaseAutozodClient} class.
    *
    * The constructor takes two arguments.
    * @param string $api_key the API key of the client
    * @param string $env the environment
    */

   public function __construct(string $api_key, string $env)
   {
      $config = $this->validateConfig(array([
         "api_key" => $api_key,
         "env" => $env
      ]));

      //Set the base URL
      if ($config['env'] == EnvironmentEnum::DEV) {
         $config['api_base'] = $this->DEV_API_BASE;
      }

      if ($config['env'] == EnvironmentEnum::PRODUCTION) {
         $config['api_base'] = $this->PRODUCTION_API_BASE;
      }

      $this->config = $config;
   }

   /**
    * Gets the API key used by the client to send requests.
    *
    * @return null|string the API key used by the client to send requests
    */
   public function getApiKey()
   {
      return $this->config['api_key'];
   }

   /**
    * Gets the base URL for Autozod's API.
    *
    * @return string the base URL for Autozod's API
    */
   public function getApiBase()
   {
      return $this->config['api_base'];
   }

   /**
    * Gets the env.
    *
    * @return string the env
    */
   public function getEnv()
   {
      return $this->config['env'];
   }

   /**
    * Sends a request to Autozod's API.
    *
    * @param string $method the HTTP method
    * @param string $path the path of the request
    * @param array $params the parameters of the request
    */

   public function request($method, $path, $params)
   {
      $client = new Client();
      $api = $this->getApiBase() . $path;
      $res = $client->request($method, $api, $params);
   }

   /**
    * @param array<string, mixed> $config
    *
    * @throws InvalidArgumentException
    */
   private function validateConfig($config)
   {
      // api_key
      if (!isset($config['api_key'])) {
         throw new InvalidArgumentException('api_key must field is required');
      }

      if (!is_string($config['api_key'])) {
         throw new InvalidArgumentException('api_key must be a string');
      }

      if ('' === $config['api_key']) {
         throw new InvalidArgumentException('api_key cannot be the empty string');
      }

      if (preg_match('/\s/', $config['api_key'])) {
         throw new InvalidArgumentException('api_key cannot contain whitespace');
      }

      // env
      $all_envs = (new EnvironmentEnum())->getConstants();

      if (!isset($config['env'])) {
         throw new InvalidArgumentException('env must field is required');
      }

      if (!is_string($config['env'])) {
         throw new InvalidArgumentException('env must be a string');
      }

      if ('' === $config['env']) {
         throw new InvalidArgumentException('env cannot be the empty string');
      }

      if (!in_array($config, $all_envs)) {
         throw new InvalidArgumentException('Invalid env');
      }

      return [
         "api_key" => $config['api_key'],
         "env" => $config['env'],
      ];
   }
}
