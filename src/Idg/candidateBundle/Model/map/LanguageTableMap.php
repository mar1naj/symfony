<?php

namespace Idg\candidateBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'language' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src.Idg.candidateBundle.Model.map
 */
class LanguageTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Idg.candidateBundle.Model.map.LanguageTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('language');
        $this->setPhpName('Language');
        $this->setClassname('Idg\\candidateBundle\\Model\\Language');
        $this->setPackage('src.Idg.candidateBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name_en', 'NameEn', 'VARCHAR', false, 100, null);
        $this->addColumn('name_or', 'NameOr', 'VARCHAR', false, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Book', 'Idg\\candidateBundle\\Model\\Book', RelationMap::ONE_TO_MANY, array('id' => 'language_id', ), null, null, 'Books');
    } // buildRelations()

} // LanguageTableMap
