<?php
namespace Fliglio\Fli;

use Fliglio\Fli\Configuration\DefaultConfiguration;

class ResolverAppMuxTest extends \PHPUnit_Framework_TestCase {

	public function setUp() {
		$_SERVER = [
			'REQUEST_URI' => '/foo',
			'REQUEST_METHOD' => 'GET',
		];
	}

	public function testFliMuxSetup() {
		$app = new StubResolverApp();
		$app->configure(new DefaultConfiguration());

		$mux = new ResolverAppMux();
		$mux->addApp($app);

		$mux->run();

		$this->assertEquals($app->chainApp->called, 1);
	}

}
