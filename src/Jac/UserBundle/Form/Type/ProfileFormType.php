<?php

/**
 * Description of ProfileFormType
 *
 * @author Jacques
 */

namespace Jac\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Jac\UserBundle\Form\Type\ResettingFormType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ProfileFormType extends BaseType {

    protected $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class) {
        parent::__construct($class);
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);

        // Ajoute le champ personnalisé aux formulaires de mise à jour du profile
        $builder
                ->add('plainPassword', ResettingFormType::class, array(
                    'required' => false,
                ))
                ->add('firstname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'registration.firstname',
                    )
                ))
                ->add('lastname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'registration.lastname',
                    )
                ))
                ->add('phone', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'registration.phone',
                    )
                ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention' => 'profile',
            'translation_domain' => 'FOSUserBundle',
            'validators' => 'validators'
        ));
    }

    public function getBlockPrefix() {
        return 'jac_user_profile';
    }

    // For Symfony2.x
    public function getName() {
        return $this->getBlockPrefix();
    }

}
