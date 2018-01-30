<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Forms;

use Symfony\Component\Validator\Constraints as Assert;

class UserSubmission
{
    /** @Assert\NotBlank */
    public $userName;

    /** @Assert\DateTime(format="Y-m-d\TH:i") */
    /** @Assert\NotBlank */
    public $userPassword;

    /** @Assert\NotBlank */
    public $userEmail;
}
