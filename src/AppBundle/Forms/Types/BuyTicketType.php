<?php
/**
 * @author Nathan Caudeli <nathan.caudeli@hotmail.com>
 */

namespace AppBundle\Forms\Types;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class BuyTicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('ticketname', TextType::class, [
                'constraints' => [new NotBlank(), new Length(['min' => 1])]
            ])
            ->add('membername', TextType::class, [
                'constraints' => [new NotBlank(), new Length(['min' => 1])]
            ])

            ->add('signup', SubmitType::class, ['label' => 'Sign up'])
        ;
    }

}
