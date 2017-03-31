<?php
/**
 * Created by PhpStorm.
 * User: maxence
 * Date: 23/05/2016
 * Time: 13:42
 */

namespace Mdespeuilles\ConfigBundle\Services\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Config extends \Twig_Extension
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * VotingSecureKey constructor.
     * @param ContainerInterface $containerInterface
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        $this->container = $containerInterface;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('getConfig',  array($this, 'getConfig')),
        );
    }


    public function getConfig($key)
    {
        return $this->container->get("mdespeuilles.config")->get($key);
    }

    public function getName()
    {
        return 'getConfig';
    }
}
