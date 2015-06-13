<?php
namespace Fliglio\Fli;


class IntParamTest extends \PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function testFliMuxSetup() {
		$_SERVER = [
			'REQUEST_URI' => '/foo',
		];
		return;
		$fli = new DefaultFli();
		$fli->configure(new DefaultConfiguration());

		$mux = new FliMux();
		$mux->addFli($fli);

		$mux->run();

		$this->assertTrue(true);
	}

}
