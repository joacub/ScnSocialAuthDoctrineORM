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
use ScnSocialAuthDoctrineORM\Mapper\UserProvider;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator;

/**
 * @category   ScnSocialAuthDoctrineORM
 * @package    ScnSocialAuthDoctrineORM_Service
 */
class UserProviderMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $options = $services->get('ScnSocialAuth-ModuleOptions');
        $entityClass = $options->getUserProviderEntityClass();

        $mapper = new UserProvider($services->get('zfcuser_doctrine_em'), $services->get('ScnSocialAuth-ModuleOptions'));
//        $mapper->setDbAdapter($services->get('ScnSocialAuth_ZendDbAdapter'));
        $mapper->setEntityPrototype(new $entityClass);
//        $mapper->setHydrator(new Hydrator\ClassMethods);

        return $mapper;
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }


}
