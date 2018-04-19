<?php

namespace Fliglio\Fli;

use Fliglio\Flfc\Apps\App;

class StubChainAppFactory implements AppFactory {
	public function create(App $appToWrap) {
		return new StubChainApp($appToWrap);
	}
}

