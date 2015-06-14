<?php

namespace Fliglio\Fli;

use Fliglio\Flfc\FcDispatcherFactory;
use Fliglio\Flfc\FcChainRegistry;

class FliMux {

	private $resolvers;

	public function __construct() {
		$this->resolvers = new FcChainRegistry();
	}

	public function addFli(Fli $fli) {
		$this->resolvers->addResolver($fli->createResolver());
	}

	// Dispatch Request
	public function run() {
		$dispatcherFactory = new FcDispatcherFactory();
		$dispatcher = $dispatcherFactory->createDefault($this->resolvers);
		$dispatcher->dispatch();
	}
}
