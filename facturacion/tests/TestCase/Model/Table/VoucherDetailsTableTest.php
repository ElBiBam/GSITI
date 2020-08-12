<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VoucherDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VoucherDetailsTable Test Case
 */
class VoucherDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VoucherDetailsTable
     */
    public $VoucherDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.VoucherDetails',
        'app.Products',
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
        $config = TableRegistry::getTableLocator()->exists('VoucherDetails') ? [] : ['className' => VoucherDetailsTable::class];
        $this->VoucherDetails = TableRegistry::getTableLocator()->get('VoucherDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VoucherDetails);

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
