<?php

namespace Idg\candidateBundle\Form\Type;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AuthorType extends BaseAbstractType
{
    protected $options = array(
        'data_class' => 'Idg\candidateBundle\Model\Author',
        'name'       => 'author',
    );

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName');
        $builder->add('lastName');
    }
}
