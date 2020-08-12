<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VoucherHeadersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VoucherHeadersTable Test Case
 */
class VoucherHeadersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VoucherHeadersTable
     */
    public $VoucherHeaders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.VoucherHeaders',
        'app.VoucherTypes',
        'app.Sellers',
        'app.Clients',
        'app.VoucherDetails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VoucherHeaders') ? [] : ['className' => VoucherHeadersTable::class];
        $this->VoucherHeaders = TableRegistry::getTableLocator()->get('VoucherHeaders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VoucherHeaders);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
