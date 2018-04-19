<?php

namespace Fliglio\Fli;

use Fliglio\Fli\Configuration\DefaultConfiguration;
use Fliglio\Routing\Type\RouteBuilder;

class FliStubConfiguration extends DefaultConfiguration {

	public function getRoutes() {
		return [
			RouteBuilder::get()
				->uri('/foo')
				->resource(new FliStubResource(), 'foo')
				->build()
		];
	}

}
