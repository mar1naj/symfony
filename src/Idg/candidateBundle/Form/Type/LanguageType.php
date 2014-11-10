<?php

namespace Idg\candidateBundle\Form\Type;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LanguageType extends BaseAbstractType
{
    protected $options = array(
        'data_class' => 'Idg\candidateBundle\Model\Language',
        'name'       => 'language',
    );

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nameEn');
        $builder->add('nameOr');
    }
	
}
