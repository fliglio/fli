<?php
namespace Fliglio\Fli;

use Fliglio\Flfc\Context;
use Fliglio\Flfc\FcDispatcher;
use Fliglio\Flfc\FcChainRegistry;
use Fliglio\Flfc\RequestFactory;

class DefaultResolverAppTest extends \PHPUnit_Framework_TestCase {

	public function setUp() {
		$_SERVER = [
			'REQUEST_URI' => '/foo',
			'REQUEST_METHOD' => 'GET',
		];

		$this->request = (new RequestFactory())->createDefault();
		$this->response = new FliStubResponse();

		$this->context = new Context($this->request, $this->response);
	}

	public function testTestBasicRun() {
		// given
		$app = new DefaultResolverApp();
		$app->configure(new FliStubConfiguration());

		$resolvers = new FcChainRegistry();
		$resolvers->addResolver($app->createResolver());

		// when
		$dispatcher = new FcDispatcher($resolvers, $this->context, '@404', '@error');
		$dispatcher->dispatch();

		// then
		$this->assertEquals($this->response->bodyWritten, '"'.FliStubResource::RESPONSE.'"');
	}

	public function testTestRun_WithAppFactory() {
		// given
		$app = new DefaultResolverApp();
		$app->configure(new FliStubConfiguration());
		$app->addAppFactory(new StubChainAppFactory());

		$resolvers = new FcChainRegistry();
		$resolvers->addResolver($app->createResolver());

		// when
		$dispatcher = new FcDispatcher($resolvers, $this->context, '@404', '@error');
		$dispatcher->dispatch();

		// then
		$this->assertEquals($this->response->bodyWritten, '"'.FliStubResource::RESPONSE.'"');
	}

}
