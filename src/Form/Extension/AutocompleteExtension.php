<?php

namespace Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AutocompleteExtension extends AbstractTypeExtension
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (false === $options['autocomplete']) {
            $options['autocomplete'] = 'off';
        }

        // It doesn't hurt even it will be left empty.
        if (empty($view->vars['attr'])) {
            $view->vars['attr'] = array();
        }

        if (null !== $options['autocomplete']) {
            $view->vars['attr'] = array_merge(array(
                'autocomplete' => $options['autocomplete'],
                'x-autocompletetype' => $options['autocomplete'],
            ), $view->vars['attr']);
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'autocomplete' => null,
        ));
    }

    public function getExtendedType()
    {
        return 'form';
    }
}
