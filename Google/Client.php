<?php

namespace Lidaa\GoogleBundle\Google;

use Lidaa\GoogleBundle\Google\Configurator;
use Google_Client;

/**
 * Description of Client
 *
 * @author lidaa
 */
class Client extends Google_Client
{
    public function __construct(Configurator $configurator)
    {
        parent::__construct($configurator->getConfig());   
    }
}