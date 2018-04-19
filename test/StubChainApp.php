<?php

namespace Fliglio\Fli;

use Fliglio\Flfc\Apps\App;
use Fliglio\Flfc\Context;

class StubChainApp extends App {

	public $context;
	public $appToCall;
	public $called = 0;

	public function __construct(App $appToCall = null) {
		$this->appToCall = $appToCall;
	}

	public function call(Context $context) {
		$this->called++;
		$this->context = $context;

		if ($this->appToCall) {
			$this->appToCall->call($context);
		}
	}
}

