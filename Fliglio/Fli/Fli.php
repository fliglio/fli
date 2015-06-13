<?php

namespace Fliglio\Fli;

interface Fli {
	public function configure(Configuration $cfg);
	public function createResolver(); // Fliglio\Flfc\Resolvers\ResolvableFcChain
}

