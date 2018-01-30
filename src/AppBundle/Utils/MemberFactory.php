<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Utils;

use AppBundle\Forms\MemberSignUp;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Tiquette\Domain\Email;
use Tiquette\Domain\EncodedPassword;
use Tiquette\Domain\Member;

class MemberFactory
{
    private $passwordEncoder;

    public function __construct(PasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function fromSignUp(MemberSignUp $signUp): Member
    {
        $salt = base64_encode(random_bytes(256));
        $rawEncodedPassword = $this->passwordEncoder->encodePassword(
            $signUp->plainTextPassword,
            $salt
        );

        return Member::signUp(
            new Email($signUp->email),
            $signUp->nickname,
            new EncodedPassword($rawEncodedPassword, $salt)
        );
    }
}
