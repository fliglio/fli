<?php

namespace Fliglio\Fli;

use Fliglio\Flfc\Response;

class FliStubResponse extends Response {

	public $headersSet = [];
	public $bodyWritten;

	public function write() {
		foreach ($this->getHeaders() as $key => $val) {
			$headersSet[] = $key . ": " . $val;
		}

		ob_start();

		if ($this->getBody()) {
			$this->getBody()->render();
		}

		$this->bodyWritten = ob_get_contents();

		ob_end_clean();
	}
}
