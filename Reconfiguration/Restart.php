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
			return $this->{$this->app->getClassMapping() . '_restart'}($this->app->getHostname(), $this->app->getPath()) &&
				info('Restart may take up to 2 minutes to complete');
		}
	}