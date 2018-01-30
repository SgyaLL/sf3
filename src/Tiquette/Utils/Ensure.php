<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tiquette\Utils;

use Assert\Assertion;

class Ensure extends Assertion
{
    protected static $assertionClass = EnsureFailed::class;
}
