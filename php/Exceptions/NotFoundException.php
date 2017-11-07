<?php
/**
 * Tozny E3DB
 *
 * LICENSE
 *
 * Tozny dual licenses this product. For commercial use, please contact
 * info@tozny.com. For non-commercial use, the contents of this file are
 * subject to the TOZNY NON-COMMERCIAL LICENSE (the "License") which
 * permits use of the software only by government agencies, schools,
 * universities, non-profit organizations or individuals on projects that
 * do not receive external funding other than government research grants
 * and contracts.  Any other use requires a commercial license. You may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at https://tozny.com/legal/non-commercial-license.
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 * License for the specific language governing rights and limitations under
 * the License. Portions of the software are Copyright (c) TOZNY LLC, 2017.
 * All rights reserved.
 *
 * @package    Tozny\E3DB
 * @copyright  Copyright (c) 2017 Tozny, LLC (https://tozny.com)
 */

declare(strict_types=1);

namespace Tozny\E3DB\Exceptions;

use Throwable;

/**
 * Error thrown when a requested resource does not exist
 *
 * @package Tozny\E3DB\Exceptions
 *
 * @codeCoverageIgnore
 */
class NotFoundException extends \Exception
{
    /**
     * @var string Name of the resource that was requested
     */
    protected $resource;

    /**
     * Custom constructor requires the message to be non-empty.
     *
     * @param string $message
     * @param string $resource
     * @param Throwable|null $previous
     */
    public function __construct(string $message, string $resource = '', Throwable $previous = null)
    {
        $this->resource = strtoupper($resource);

        parent::__construct($message, 404, $previous);
    }

    /**
     * Customize the error output returned for printing to a log.
     *
     * @return string
     */
    public function __toString()
    {
        if (empty($this->resource)) {
            return '404 NOT FOUND: ' . $this->message . "\n";
        }

        return "404 {$this->resource} NOT FOUND: {$this->message}\n";
    }
}