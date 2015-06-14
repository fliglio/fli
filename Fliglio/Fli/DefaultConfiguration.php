<?php

namespace Fliglio\Fli;

use Fliglio\Routing\DefaultInjectablesFactory;

class DefaultConfiguration extends Configuration {

	public function getInjectables() {
		return (new DefaultInjectablesFactory())->createAll();
	}
}

