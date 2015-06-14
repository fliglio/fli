<?php
namespace Fliglio\Fli;


class ResolverAppMuxTest extends \PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function testFliMuxSetup() {
		$_SERVER = [
			'REQUEST_URI' => '/foo',
			'REQUEST_METHOD' => 'GET',
		];
		$fli = new DefaultResolverApp();
		$fli->configure(new DefaultConfiguration());

		$mux = new ResolverAppMux();
		$mux->addApp($fli);

		$mux->run();

		$this->assertTrue(true);
	}

}
