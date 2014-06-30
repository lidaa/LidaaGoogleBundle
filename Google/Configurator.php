<?php

namespace Lidaa\GoogleBundle\Google;

use Symfony\Component\DependencyInjection\Container;
use Google_Config;
use ReflectionClass;

/**
 * Description of Configuration
 *
 * @author Lidaa
 */
class Configurator
{
    private $config;

    public function __construct(Container $container)
    {
        $userConfig = $container->getParameter('lidaa_google.config');
        if (is_array($userConfig))
        {
            $class = new ReflectionClass("Google_Config");
            $property = $class->getProperty("configuration");
            $property->setAccessible(true);

            $googleConfig = new Google_Config();
            $defautConfig = $property->getValue($googleConfig);
            $config = array_merge($defautConfig, array_filter($userConfig));

            $property->setValue($googleConfig, $config);

            $this->config = $googleConfig;
        }
        else
        {
            throw new \InvalidArgumentException('There is no "lidaa_google" config.');
        }
    }

    public function getConfig()
    {
        return $this->config;
    }

}