<?php

namespace Eo\RedirectBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class RedirectAdmin extends Admin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('redirectFrom', null, array('required' => true))
            ->add('redirectTo', null, array('required' => true))
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('redirectFrom', null, array('editable' => true))
            ->add('redirectTo', null, array('editable' => true))
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
