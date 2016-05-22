<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class MicroKernel extends Kernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        return array(new Symfony\Bundle\FrameworkBundle\FrameworkBundle());
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        // clear cache folder after add routes
        $routes->add('/', 'kernel:indexAction', 'index');
        $routes->add('/api', 'kernel:apiAction', 'api');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', ['secret' => '12345']);
    }

    public function indexAction()
    {
        return new Response('Hello World');
    }

    public function apiAction()
    {
        return new Response('Hello World from api action');
    }
}