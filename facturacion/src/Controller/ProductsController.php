<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

	public function search(){
        $this->request->allowMethod('ajax');

        $keyword = $this->request->query('keyword');

        $query = $this->Products->find('all',[
            'conditions'=>['description LIKE'=>'%'.$keyword.'%'],
            'order'=> ['Products.id'=>'DESC'],
            'limit' =>10
        ]); 
        $this->set('products', $this->paginate($query));
        $this->set('_serialize', ['products']); 
   	
	 }



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
            'contain' => ['ProductTypes', 'Providers' => ['Persons']]
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['ProductTypes', 'Providers' => ['Persons'], 'Warehouses', 'VoucherDetails']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $providers = $this->Products->Providers->find('all')->contain('Persons')->find('list', ['keyField'=>'id','valueField'=>'person.name','limit' => 200]);
        $warehouses = $this->Products->Warehouses->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productTypes', 'providers', 'warehouses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Providers', 'Warehouses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $providers = $this->Products->Providers->find('list', ['limit' => 200]);
        $warehouses = $this->Products->Warehouses->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productTypes', 'providers', 'warehouses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
