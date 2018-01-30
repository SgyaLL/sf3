<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Forms\Types;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class MemberSignUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [new Email()]
            ])
            ->add('nickname', TextType::class, [
                'constraints' => [new NotBlank(), new Length(['min' => 1])]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'property_path' => 'plainTextPassword',
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Password confirmation']
            ])
            ->add('signup', SubmitType::class, ['label' => 'Sign up'])
        ;
    }

}
