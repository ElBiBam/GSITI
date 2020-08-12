<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Providers Controller
 *
 * @property \App\Model\Table\ProvidersTable $Providers
 *
 * @method \App\Model\Entity\Provider[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProvidersController extends AppController
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
            'contain' => ['Persons']
        ];
        $providers = $this->paginate($this->Providers);

        $this->set(compact('providers'));
    }

    /**
     * View method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provider = $this->Providers->get($id, [
            'contain' => ['Persons', 'Products']
        ]);

        $this->set('provider', $provider);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $provider = $this->Providers->newEntity();
        if ($this->request->is('post')) {
            $provider = $this->Providers->patchEntity($provider, $this->request->getData());
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('The provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provider could not be saved. Please, try again.'));
        }
        $persons = $this->Providers->Persons->find('list', ['limit' => 200]);
        $products = $this->Providers->Products->find('list', ['limit' => 200]);
        $this->set(compact('provider', 'persons', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provider = $this->Providers->get($id, [
            'contain' => ['Products']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provider = $this->Providers->patchEntity($provider, $this->request->getData());
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('The provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provider could not be saved. Please, try again.'));
        }
        $persons = $this->Providers->Persons->find('list', ['limit' => 200]);
        $products = $this->Providers->Products->find('list', ['limit' => 200]);
        $this->set(compact('provider', 'persons', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provider = $this->Providers->get($id);
        if ($this->Providers->delete($provider)) {
            $this->Flash->success(__('The provider has been deleted.'));
        } else {
            $this->Flash->error(__('The provider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
