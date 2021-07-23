<?php
	/**
 * Copyright (C) Apis Networks, Inc - All Rights Reserved.
 *
 * Unauthorized copying of this file, via any medium, is
 * strictly prohibited without consent. Any dissemination of
 * material herein is prohibited.
 *
 * For licensing inquiries email <licensing@apisnetworks.com>
 *
 * Written by Matt Saladna <matt@apisnetworks.com>, August 2020
 */

	namespace Module\Support\Webapps\App\Type\Passenger;

	use Module\Support\Webapps\App\Type\Unknown\Handler as Unknown;
	use Module\Support\Webapps\Traits\PublicRelocatable;

	class Handler extends Unknown
	{
		use PublicRelocatable {
			getAppRoot as getAppRootReal;
		}
		const NAME = 'Passenger';
		const ADMIN_PATH = null;

		const DEFAULT_FORTIFICATION = 'max';
		const FEAT_ALLOW_SSL = true;
		const FEAT_RECOVERY = false;

		const TRANSIENT_RECONFIGURABLES = [
			'restart'
		];

		public function hasFortification(): bool
		{
			return false;
		}

		public function display(): bool {
			return static::class !== self::class;
		}

		public function getAppRoot(): ?string
		{
			return $this->getAppRootReal($this->getHostname(), $this->getPath());
		}
	}