<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Forms;

use Symfony\Component\Validator\Constraints as Assert;

class MemberSignUp
{
    /** @Assert\NotBlank */
    /** @Assert\Email */
    public $email;

    /** @Assert\NotBlank */
    /** @Assert\Length(min="1") */
    /** @Assert\Length(max="32") */
    public $nickname;

    /** @Assert\NotBlank */
    /** @Assert\Length(min="2") */
    /** @Assert\Length(max="32") */
    public $password;

    /** @Assert\NotBlank */
    /** @Assert\Length(min="2") */
    /** @Assert\Length(max="32") */
    public $passwordConfirmation;
}
