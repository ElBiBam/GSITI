<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsWarehouses Controller
 *
 * @property \App\Model\Table\ProductsWarehousesTable $ProductsWarehouses
 *
 * @method \App\Model\Entity\ProductsWarehouse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsWarehousesController extends AppController
{
    public function isAuthorized($user)
    {        
        $email = $this->Auth->user('email');
        $this->loadModel('Users');
            
        $role = $this->Users->find('all', ['conditions' => ['email'=>$email], 'fields' => ['role_id']])->first();
        $action = $this->request->getParam('action');
        if($role->role_id === 1){
            if (in_array($action, ['index', 'view', 'add', 'edit', 'delete', 'search'])) {
                return true;
            }else{
                return false;                
            }
        }
        if($role->role_id === 2){
            if (in_array($action, ['index', 'view'])) {
                return true;
            }else{
                return false;                
            }
        }
        if($role->role_id === 3){
            if (in_array($action, ['index', 'view', 'add'])) {
                return true;
            }else{
                return false;
            }
        }
        if($role->role_id === 4){
            if (in_array($action, ['index', 'view'])) {
                return true;
            }else{
                return false;
            }
        }

        return false;          
    }
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['display', 'logout', 'login', 'loginfb']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Warehouses', 'Products']
        ];
        $productsWarehouses = $this->paginate($this->ProductsWarehouses);

        $this->set(compact('productsWarehouses'));
    }

    /**
     * View method
     *
     * @param string|null $id Products Warehouse id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsWarehouse = $this->ProductsWarehouses->get($id, [
            'contain' => ['Warehouses', 'Products']
        ]);

        $this->set('productsWarehouse', $productsWarehouse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsWarehouse = $this->ProductsWarehouses->newEntity();
        if ($this->request->is('post')) {
            $productsWarehouse = $this->ProductsWarehouses->patchEntity($productsWarehouse, $this->request->getData());
            if ($this->ProductsWarehouses->save($productsWarehouse)) {
                $this->Flash->success(__('The products warehouse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products warehouse could not be saved. Please, try again.'));
        }
        $warehouses = $this->ProductsWarehouses->Warehouses->find('list', ['limit' => 200]);
        $products = $this->ProductsWarehouses->Products->find('list', ['limit' => 200]);
        $this->set(compact('productsWarehouse', 'warehouses', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Warehouse id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsWarehouse = $this->ProductsWarehouses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsWarehouse = $this->ProductsWarehouses->patchEntity($productsWarehouse, $this->request->getData());
            if ($this->ProductsWarehouses->save($productsWarehouse)) {
                $this->Flash->success(__('The products warehouse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products warehouse could not be saved. Please, try again.'));
        }
        $warehouses = $this->ProductsWarehouses->Warehouses->find('list', ['limit' => 200]);
        $products = $this->ProductsWarehouses->Products->find('list', ['limit' => 200]);
        $this->set(compact('productsWarehouse', 'warehouses', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Warehouse id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsWarehouse = $this->ProductsWarehouses->get($id);
        if ($this->ProductsWarehouses->delete($productsWarehouse)) {
            $this->Flash->success(__('The products warehouse has been deleted.'));
        } else {
            $this->Flash->error(__('The products warehouse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
