<?php
/**
 * ScnSocialAuthDoctrineORM Module
 *
 * @category   ScnSocialAuthDoctrineORM
 * @package    ScnSocialAuthDoctrineORM_Service
 */

namespace ScnSocialAuthDoctrineORM\Service;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use ScnSocialAuthDoctrineORM\Options;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @category   ScnSocialAuthDoctrineORM
 * @package    ScnSocialAuthDoctrineORM_Service
 */
class ModuleOptionsFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('Configuration');

        return new Options\ModuleOptions(isset($config['scn-social-auth']) ? $config['scn-social-auth'] : array());
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }


}
