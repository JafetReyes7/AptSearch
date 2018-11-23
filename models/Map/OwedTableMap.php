<?php

namespace Map;

use \Owed;
use \OwedQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'owed' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OwedTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OwedTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'owed';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Owed';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Owed';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the ID field
     */
    const COL_ID = 'owed.ID';

    /**
     * the column name for the Timestamp field
     */
    const COL_TIMESTAMP = 'owed.Timestamp';

    /**
     * the column name for the SenderID field
     */
    const COL_SENDERID = 'owed.SenderID';

    /**
     * the column name for the ReceiverID field
     */
    const COL_RECEIVERID = 'owed.ReceiverID';

    /**
     * the column name for the Amount field
     */
    const COL_AMOUNT = 'owed.Amount';

    /**
     * the column name for the DateDue field
     */
    const COL_DATEDUE = 'owed.DateDue';

    /**
     * the column name for the Name field
     */
    const COL_NAME = 'owed.Name';

    /**
     * the column name for the Details field
     */
    const COL_DETAILS = 'owed.Details';

    /**
     * the column name for the PaymentID field
     */
    const COL_PAYMENTID = 'owed.PaymentID';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Timestamp', 'Senderid', 'Receiverid', 'Amount', 'Datedue', 'Name', 'Details', 'Paymentid', ),
        self::TYPE_CAMELNAME     => array('id', 'timestamp', 'senderid', 'receiverid', 'amount', 'datedue', 'name', 'details', 'paymentid', ),
        self::TYPE_COLNAME       => array(OwedTableMap::COL_ID, OwedTableMap::COL_TIMESTAMP, OwedTableMap::COL_SENDERID, OwedTableMap::COL_RECEIVERID, OwedTableMap::COL_AMOUNT, OwedTableMap::COL_DATEDUE, OwedTableMap::COL_NAME, OwedTableMap::COL_DETAILS, OwedTableMap::COL_PAYMENTID, ),
        self::TYPE_FIELDNAME     => array('ID', 'Timestamp', 'SenderID', 'ReceiverID', 'Amount', 'DateDue', 'Name', 'Details', 'PaymentID', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Timestamp' => 1, 'Senderid' => 2, 'Receiverid' => 3, 'Amount' => 4, 'Datedue' => 5, 'Name' => 6, 'Details' => 7, 'Paymentid' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'timestamp' => 1, 'senderid' => 2, 'receiverid' => 3, 'amount' => 4, 'datedue' => 5, 'name' => 6, 'details' => 7, 'paymentid' => 8, ),
        self::TYPE_COLNAME       => array(OwedTableMap::COL_ID => 0, OwedTableMap::COL_TIMESTAMP => 1, OwedTableMap::COL_SENDERID => 2, OwedTableMap::COL_RECEIVERID => 3, OwedTableMap::COL_AMOUNT => 4, OwedTableMap::COL_DATEDUE => 5, OwedTableMap::COL_NAME => 6, OwedTableMap::COL_DETAILS => 7, OwedTableMap::COL_PAYMENTID => 8, ),
        self::TYPE_FIELDNAME     => array('ID' => 0, 'Timestamp' => 1, 'SenderID' => 2, 'ReceiverID' => 3, 'Amount' => 4, 'DateDue' => 5, 'Name' => 6, 'Details' => 7, 'PaymentID' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('owed');
        $this->setPhpName('Owed');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Owed');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Timestamp', 'Timestamp', 'INTEGER', true, null, null);
        $this->addForeignKey('SenderID', 'Senderid', 'INTEGER', 'user', 'ID', true, null, null);
        $this->addForeignKey('ReceiverID', 'Receiverid', 'INTEGER', 'user', 'ID', true, null, null);
        $this->addColumn('Amount', 'Amount', 'INTEGER', true, null, null);
        $this->addColumn('DateDue', 'Datedue', 'DATE', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 56, null);
        $this->addColumn('Details', 'Details', 'VARCHAR', true, 128, null);
        $this->addForeignKey('PaymentID', 'Paymentid', 'INTEGER', 'payment', 'ID', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PaymentRelatedByPaymentid', '\\Payment', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':PaymentID',
    1 => ':ID',
  ),
), null, null, null, false);
        $this->addRelation('UserRelatedByReceiverid', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':ReceiverID',
    1 => ':ID',
  ),
), null, null, null, false);
        $this->addRelation('UserRelatedBySenderid', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':SenderID',
    1 => ':ID',
  ),
), null, null, null, false);
        $this->addRelation('PaymentRelatedByOwedid', '\\Payment', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':OwedID',
    1 => ':ID',
  ),
), null, null, 'PaymentsRelatedByOwedid', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? OwedTableMap::CLASS_DEFAULT : OwedTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Owed object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OwedTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OwedTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OwedTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OwedTableMap::OM_CLASS;
            /** @var Owed $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OwedTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = OwedTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OwedTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Owed $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OwedTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(OwedTableMap::COL_ID);
            $criteria->addSelectColumn(OwedTableMap::COL_TIMESTAMP);
            $criteria->addSelectColumn(OwedTableMap::COL_SENDERID);
            $criteria->addSelectColumn(OwedTableMap::COL_RECEIVERID);
            $criteria->addSelectColumn(OwedTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(OwedTableMap::COL_DATEDUE);
            $criteria->addSelectColumn(OwedTableMap::COL_NAME);
            $criteria->addSelectColumn(OwedTableMap::COL_DETAILS);
            $criteria->addSelectColumn(OwedTableMap::COL_PAYMENTID);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.Timestamp');
            $criteria->addSelectColumn($alias . '.SenderID');
            $criteria->addSelectColumn($alias . '.ReceiverID');
            $criteria->addSelectColumn($alias . '.Amount');
            $criteria->addSelectColumn($alias . '.DateDue');
            $criteria->addSelectColumn($alias . '.Name');
            $criteria->addSelectColumn($alias . '.Details');
            $criteria->addSelectColumn($alias . '.PaymentID');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(OwedTableMap::DATABASE_NAME)->getTable(OwedTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OwedTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OwedTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OwedTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Owed or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Owed object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OwedTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Owed) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OwedTableMap::DATABASE_NAME);
            $criteria->add(OwedTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = OwedQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OwedTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OwedTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the owed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OwedQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Owed or Criteria object.
     *
     * @param mixed               $criteria Criteria or Owed object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OwedTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Owed object
        }

        if ($criteria->containsKey(OwedTableMap::COL_ID) && $criteria->keyContainsValue(OwedTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OwedTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = OwedQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OwedTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OwedTableMap::buildTableMap();