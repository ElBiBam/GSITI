<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsProviders Controller
 *
 * @property \App\Model\Table\ProductsProvidersTable $ProductsProviders
 *
 * @method \App\Model\Entity\ProductsProvider[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsProvidersController extends AppController
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
            'contain' => ['Products', 'Providers' => ['Persons']]
        ];
        $productsProviders = $this->paginate($this->ProductsProviders);

        $this->set(compact('productsProviders'));
    }

    /**
     * View method
     *
     * @param string|null $id Products Provider id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsProvider = $this->ProductsProviders->get($id, [
            'contain' => ['Products', 'Providers']
        ]);

        $this->set('productsProvider', $productsProvider);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsProvider = $this->ProductsProviders->newEntity();
        if ($this->request->is('post')) {
            $productsProvider = $this->ProductsProviders->patchEntity($productsProvider, $this->request->getData());
            if ($this->ProductsProviders->save($productsProvider)) {
                $this->Flash->success(__('The products provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products provider could not be saved. Please, try again.'));
        }
        $products = $this->ProductsProviders->Products->find('list', ['limit' => 200]);
        $providers = $this->ProductsProviders->Providers->find('list', ['limit' => 200]);
        $this->set(compact('productsProvider', 'products', 'providers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Provider id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsProvider = $this->ProductsProviders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsProvider = $this->ProductsProviders->patchEntity($productsProvider, $this->request->getData());
            if ($this->ProductsProviders->save($productsProvider)) {
                $this->Flash->success(__('The products provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products provider could not be saved. Please, try again.'));
        }
        $products = $this->ProductsProviders->Products->find('list', ['limit' => 200]);
        $providers = $this->ProductsProviders->Providers->find('list', ['limit' => 200]);
        $this->set(compact('productsProvider', 'products', 'providers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Provider id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsProvider = $this->ProductsProviders->get($id);
        if ($this->ProductsProviders->delete($productsProvider)) {
            $this->Flash->success(__('The products provider has been deleted.'));
        } else {
            $this->Flash->error(__('The products provider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
