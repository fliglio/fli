<?php

namespace Fliglio\Fli;

interface ResolverApp {
	public function configure(Configuration $cfg);
	public function createResolver(); // Fliglio\Flfc\Resolvers\ResolvableFcChain
}

