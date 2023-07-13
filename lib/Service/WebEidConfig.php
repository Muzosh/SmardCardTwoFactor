<?php

/**
 *
 * @copyright Copyright (c) 2022, Petr Muzikant (petr.muzikant@vut.cz)
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */

declare(strict_types=1);

namespace OCA\TwoFactorWebEid\Service;

use ArrayAccess;

class WebEidConfig implements ArrayAccess {
	private array $configArray;

	public function __construct() {
		// ! CHANGE ME
		$this->configArray = array(
			'CHALLENGE_NONCE_TTL_SECONDS' => 300,
			'TRUSTED_CERT_PATH' => __DIR__.'/../../trustedcerts',
			'ORIGIN' => 'https://localhost:8443'
		);
	}

	public function offsetExists($offset): bool {
		return isset($this->configArray[$offset]);
	}

	public function offsetGet($offset) {
		return $this->configArray[$offset];
	}

	public function offsetUnset($offset): void {
		unset($this->configArray[$offset]);
	}

	public function offsetSet($offset, $value): void {
		$this->configArray[$offset] = $value;
	}
}
