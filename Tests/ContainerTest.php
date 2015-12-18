<?php

namespace Redeye\MainBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Yaml\Yaml;

class ContainerTest extends WebTestCase
{
    private $client, $container;

    public function setUp()
    {
        $this->client = static::createClient();
        $this->container = $this->client->getContainer();
        $this->client->getKernel()->boot();
    }

    public function testServices()
    {
        $file = __DIR__.'/../Resources/config/services.yml';

        if (!is_file($file)) {
            $this->markTestSkipped();
        }

        foreach ($this->extractServices($file) as $service) {
            $this->assertNotNull($x=$this->container->get($service));
        }
    }

    private function extractServices($file)
    {
        $services = [];

        $data = Yaml::parse($file);

        foreach (@$data['services'] ?: [] as $service => $definition) {
            if (empty($definition['abstract']) && (!isset($definition['public']) || $definition['public'])) {
                $services[] = $service;
            }
        }

        foreach (@$data['imports'] ?: [] as $import) {
            $services = array_merge(
                $services,
                $this->extractServices(dirname($file).'/'.$import['resource'])
            );
        }

        return $services;
    }
}
