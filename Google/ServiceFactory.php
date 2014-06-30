<?php

namespace Lidaa\GoogleBundle\Google;

use Lidaa\GoogleBundle\Google\Client;

/**
 * Description of Service
 *
 * @author Lidaa
 */
class ServiceFactory
{
    private $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    public function create($type)
    {
        $class =  '\Google_Service_'.ucfirst($type);
        
        return new $class($this->client);
    }
}