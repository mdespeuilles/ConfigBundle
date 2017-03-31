<?php
/**
 * Created by PhpStorm.
 * User: maxence
 * Date: 23/05/2016
 * Time: 13:36
 */

namespace Mdespeuilles\ConfigBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Config
{

    /**
     * @var ContainerInterface $containerInterface
     */
    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface)
    {
        $this->containerInterface = $containerInterface;
    }

    public function get($key) {
        $config = $this->containerInterface->get("mdespeuilles.entity.config")->findOneBy([
           "configKey" => $key
        ]);

        return ($config) ? $config->getValue() : null;
    }
}
