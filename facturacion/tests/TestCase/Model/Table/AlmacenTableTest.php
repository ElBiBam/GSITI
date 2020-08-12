<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlmacenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlmacenTable Test Case
 */
class AlmacenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlmacenTable
     */
    public $Almacen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Almacen',
        'app.Producto'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Almacen') ? [] : ['className' => AlmacenTable::class];
        $this->Almacen = TableRegistry::getTableLocator()->get('Almacen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Almacen);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
