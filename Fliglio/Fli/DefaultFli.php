<?php

namespace Fliglio\Fli;

use Fliglio\Routing\Type\Route;
use Fliglio\Routing\RouteMap;
use Fliglio\Routing\Injectable;

use Fliglio\Flfc\Apps\HttpApp;
use Fliglio\Flfc\Apps\RestApp;
use Fliglio\Routing\UrlLintApp;
use Fliglio\Routing\RoutingApp;
use Fliglio\Routing\DefaultInvokerApp;

use Fliglio\Routing\Type\RouteBuilder;
use Fliglio\Flfc\Resolvers\DefaultFcChainResolver;

class DefaultFli implements Fli {

	private $routeMap;
	private $injectables = [];

	public function __construct() {
		$this->routeMap = new RouteMap();
	}


	protected function connectRoute(Route $route) {
		$this->routeMap->connect(uniqid(), $route);
	}

	protected function addInjectable(Injectable $injectable) {
		$this->injectables[] = $injectable;
	}

	public function configure(Configuration $cfg) {
		foreach ($cfg->getRoutes() as $route) {
			$this->connectRoute($route);
		}
		foreach ($cfg->getInjectables() as $injectable) {
			$this->addInjectable($injectable);
		}

	}
	public function createResolver() {
		$chain  = new HttpApp(new RestApp(new UrlLintApp(new RoutingApp(new DefaultInvokerApp($this->injectables), $this->routeMap))));
		return new DefaultFcChainResolver($chain);
	}
}

