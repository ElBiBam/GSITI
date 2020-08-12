<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VoucherTypes Controller
 *
 * @property \App\Model\Table\VoucherTypesTable $VoucherTypes
 *
 * @method \App\Model\Entity\VoucherType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VoucherTypesController extends AppController
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
        $voucherTypes = $this->paginate($this->VoucherTypes);

        $this->set(compact('voucherTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Voucher Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $voucherType = $this->VoucherTypes->get($id, [
            'contain' => ['VoucherHeaders']
        ]);

        $this->set('voucherType', $voucherType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $voucherType = $this->VoucherTypes->newEntity();
        if ($this->request->is('post')) {
            $voucherType = $this->VoucherTypes->patchEntity($voucherType, $this->request->getData());
            if ($this->VoucherTypes->save($voucherType)) {
                $this->Flash->success(__('The voucher type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The voucher type could not be saved. Please, try again.'));
        }
        $this->set(compact('voucherType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Voucher Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $voucherType = $this->VoucherTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $voucherType = $this->VoucherTypes->patchEntity($voucherType, $this->request->getData());
            if ($this->VoucherTypes->save($voucherType)) {
                $this->Flash->success(__('The voucher type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The voucher type could not be saved. Please, try again.'));
        }
        $this->set(compact('voucherType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Voucher Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $voucherType = $this->VoucherTypes->get($id);
        if ($this->VoucherTypes->delete($voucherType)) {
            $this->Flash->success(__('The voucher type has been deleted.'));
        } else {
            $this->Flash->error(__('The voucher type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
