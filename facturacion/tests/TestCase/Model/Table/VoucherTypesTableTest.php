<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VoucherTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VoucherTypesTable Test Case
 */
class VoucherTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VoucherTypesTable
     */
    public $VoucherTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.VoucherTypes',
        'app.VoucherHeaders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VoucherTypes') ? [] : ['className' => VoucherTypesTable::class];
        $this->VoucherTypes = TableRegistry::getTableLocator()->get('VoucherTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VoucherTypes);

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
