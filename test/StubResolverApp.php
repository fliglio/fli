<?php

namespace Fliglio\Fli;

use Fliglio\Fli\Configuration\Configuration;
use Fliglio\Flfc\Resolvers\DefaultFcChainResolver;

class StubResolverApp extends DefaultResolverApp {
	public $chainApp;

	public function __construct() {
		$this->chainApp  = new StubChainApp();
	}

	public function configure(Configuration $cfg) {
	
	}

	public function createResolver() {
		return new DefaultFcChainResolver($this->chainApp);
	}

}
