<?php

namespace Fliglio\Fli;


use Fliglio\Flfc\Apps\App;
use Fliglio\Flfc\Context;


class StubChainApp extends App {
	public $context;

	public $called = 0;

	public function __construct() {
	}

	public function call(Context $context) {
		$this->called++;
		$this->context = $context;
	}
}

