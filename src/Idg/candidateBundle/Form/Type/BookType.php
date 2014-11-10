<?php

namespace Idg\candidateBundle\Form\Type;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BookType extends BaseAbstractType
{
    protected $options = array(
        'data_class' => 'Idg\candidateBundle\Model\Book',
        'name'       => 'book',
    );

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
        $builder->add('isbn');
        $builder->add('authorId');
        $builder->add('languageId');
    }
}
