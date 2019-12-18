<?php

namespace App\Form;

use App\Entity\Empresa;
use App\Entity\Sector;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class EmpresaType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // $sector = new Sector();
        // $sector = $this->getDoctrine()->getRepository(Sector::class)->findAll();      

        $builder
            ->add('nombre_empresa', TextType::class, ['required'=> true,])
            ->add('tlf_empresa', IntegerType::class, ['required' => false,])
            ->add('email_empresa', TextType::class, ['required' => false,])
            ->add('sector_empresa', IntegerType::class, [
                'required' => true,
                ]);

        // $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
        //     // ... add a choice list of friends of the current application user
        // });
    

    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empresa::class,
        ]);
    }
}
