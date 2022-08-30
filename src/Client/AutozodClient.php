<?php

namespace Hyperzod\AutozodSdkPhp\Client;

use Hyperzod\AutozodSdkPhp\Service\CoreServiceFactory;

class AutozodClient extends BaseAutozodClient
{
    /**
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}
