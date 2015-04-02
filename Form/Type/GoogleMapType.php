<?php

namespace Admingenerator\FormExtensionsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * See `Resources/doc/google-map/overview.md` for documentation
 *
 * @author Ollie Harridge <code@oll.ie>
 */
class GoogleMapType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add($options['lat_name'], $options['type'], array_merge($options['options'], $options['lat_options']))
            ->add($options['lng_name'], $options['type'], array_merge($options['options'], $options['lng_options']))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'type'           => 'text',
            'options'        => array(),
            'lat_options'    => array(),
            'lng_options'    => array(),
            'lat_name'       => 'latitude',
            'lng_name'       => 'longitude',
            'error_bubbling' => false,
            'map_width'      => 300,
            'map_height'     => 300,
            'default_lat'    => 51.5,
            'default_lng'    => -0.1245,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
            $view->vars['lat_name'] = $options['lat_name']; 
            $view->vars['lng_name'] = $options['lng_name']; 
            $view->vars['map_width'] = $options['map_width']; 
            $view->vars['map_height'] = $options['map_height']; 
            $view->vars['default_lat'] = $options['default_lat']; 
            $view->vars['default_lng'] = $options['default_lng']; 
    }

    public function getParent()
    {
        return 'form';
    }

    public function getName()
    {
        return 's2a_google_map';
    }
}