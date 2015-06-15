<?php

namespace Fliglio\Fli;

use Fliglio\Fli\Configuration\Configuration;

interface ResolverApp {
	public function configure(Configuration $cfg);
	public function createResolver(); // Fliglio\Flfc\Resolvers\ResolvableFcChain
}

