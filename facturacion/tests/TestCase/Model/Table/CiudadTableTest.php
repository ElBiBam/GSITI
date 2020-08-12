<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CiudadTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CiudadTable Test Case
 */
class CiudadTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CiudadTable
     */
    public $Ciudad;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ciudad',
        'app.Persona'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ciudad') ? [] : ['className' => CiudadTable::class];
        $this->Ciudad = TableRegistry::getTableLocator()->get('Ciudad', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ciudad);

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
