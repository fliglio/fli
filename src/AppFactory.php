<?php

namespace Fliglio\Fli;

use Fliglio\Flfc\Apps\App;

interface AppFactory {

	public function create(App $appToWrap);

}