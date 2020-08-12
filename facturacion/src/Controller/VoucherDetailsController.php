<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * VoucherDetails Controller
 *
 * @property \App\Model\Table\VoucherDetailsTable $VoucherDetails
 *
 * @method \App\Model\Entity\VoucherDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VoucherDetailsController extends AppController
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
            'contain' => ['Products', 'VoucherHeaders']
        ];
        $voucherDetails = $this->paginate($this->VoucherDetails);

        $this->set(compact('voucherDetails'));
    }    

    /**
     * View method
     *
     * @param string|null $id Voucher Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $voucherDetail = $this->VoucherDetails->get($id, [
            'contain' => ['Products', 'VoucherHeaders']
        ]);

        $this->set('voucherDetail', $voucherDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $voucherDetail = $this->VoucherDetails->newEntity();
        if ($this->request->is('post')) {
            $voucherDetail = $this->VoucherDetails->patchEntity($voucherDetail, $this->request->getData());
            if ($this->VoucherDetails->save($voucherDetail)) {
                $this->Flash->success(__('The voucher detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The voucher detail could not be saved. Please, try again.'));
        }
        $products = $this->VoucherDetails->Products->find('list', ['limit' => 200]);
        $voucherHeaders = $this->VoucherDetails->VoucherHeaders->find('list', ['limit' => 200]);
        $this->set(compact('voucherDetail', 'products', 'voucherHeaders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Voucher Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $voucherDetail = $this->VoucherDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $voucherDetail = $this->VoucherDetails->patchEntity($voucherDetail, $this->request->getData());
            if ($this->VoucherDetails->save($voucherDetail)) {
                $this->Flash->success(__('The voucher detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The voucher detail could not be saved. Please, try again.'));
        }
        $products = $this->VoucherDetails->Products->find('list', ['limit' => 200]);
        $voucherHeaders = $this->VoucherDetails->VoucherHeaders->find('list', ['limit' => 200]);
        $this->set(compact('voucherDetail', 'products', 'voucherHeaders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Voucher Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $voucherDetail = $this->VoucherDetails->get($id);
        if ($this->VoucherDetails->delete($voucherDetail)) {
            $this->Flash->success(__('The voucher detail has been deleted.'));
        } else {
            $this->Flash->error(__('The voucher detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
