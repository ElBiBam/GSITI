<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolTable Test Case
 */
class RolTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RolTable
     */
    public $Rol;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Rol',
        'app.User'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Rol') ? [] : ['className' => RolTable::class];
        $this->Rol = TableRegistry::getTableLocator()->get('Rol', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rol);

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
