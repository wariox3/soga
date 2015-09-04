<?php
namespace Soga\NominaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class SsoPeriodoDetalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text', array('required' => true))
            ->add('sucursalRel', 'entity', array(
                'class' => 'SogaNominaBundle:SsoSucursal',
                'property' => 'nombre',
            ))
            ->add('guardar', 'submit');
    }

    public function getName()
    {
        return 'form';
    }
}

