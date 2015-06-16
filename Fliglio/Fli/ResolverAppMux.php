<?php

namespace Fliglio\Fli;

use Fliglio\Flfc\FcDispatcher;
use Fliglio\Flfc\FcChainRegistry;
use Fliglio\Flfc\RequestFactory;
use Fliglio\Flfc\Response;
use Fliglio\Flfc\Context;

class ResolverAppMux {

	private $resolvers;

	public function __construct() {
		$this->resolvers = new FcChainRegistry();
	}

	public function addApp(ResolverApp $fli) {
		$this->resolvers->addResolver($fli->createResolver());
	}

	protected function getResolvers() {
		return $this->resolvers;
	}
	
	protected function getRequest() {
		return $request = (new RequestFactory())->createDefault();
	}

	// Dispatch Request
	public function run() {
		$request = $this->getREquest();
		$response = new Response();

		$context = new Context($request, $response);

		$dispatcher = new FcDispatcher($this->getResolvers(), $context, '@404', '@error');

		$dispatcher->dispatch();
	}
}
