<?php declare(strict_types=1);
/*
 * Copyright (C) Apis Networks, Inc - All Rights Reserved.
 *
 * Unauthorized copying of this file, via any medium, is
 * strictly prohibited without consent. Any dissemination of
 * material herein is prohibited.
 *
 * For licensing inquiries email <licensing@apisnetworks.com>
 *
 * Written by Matt Saladna <matt@apisnetworks.com>, July 2021
 */


	namespace Module\Support\Webapps\App\Type\Passenger\Reconfiguration;

	use Module\Support\Webapps\App\Reconfigurator;
	use Module\Support\Webapps\Contracts\ReconfigurableProperty;
	use Module\Support\Webapps\Passenger;

	class Restart extends Reconfigurator implements ReconfigurableProperty
	{
		public function handle(&$val): bool
		{
			// language type isn't used here, but to silence inference from Passengerfile.json
			return Passenger::instantiateContexted(
				$this->getAuthContext(), [$this->app->getAppRoot(), 'ruby'])->restart() &&
				info('Restart may take up to 2 minutes to complete');
		}
	}