<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * VoucherHeaders Controller
 *
 * @property \App\Model\Table\VoucherHeadersTable $VoucherHeaders
 *
 * @method \App\Model\Entity\VoucherHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VoucherHeadersController extends AppController
{    
    public function pdf(){
        
    }
    public function search(){
        $this->request->allowMethod('ajax');

        $keyword = $this->request->query('keyword');

        $query = $this->VoucherHeaders->find('all',[
            'conditions'=>['issue_date LIKE'=>'%'.$keyword.'%'],
            'order'=> ['VoucherHeaders.id'=>'DESC'],
            'limit' =>20
        ]); 
        $this->set('voucherHeaders', $this->paginate($query));
        $this->set('_serialize', ['voucherHeaders']); 
    }
    

    public $components = array('RequestHandler');
    public function isAuthorized($user)
    {        
        $email = $this->Auth->user('email');
        $this->loadModel('Users');
            
        $role = $this->Users->find('all', ['conditions' => ['email'=>$email], 'fields' => ['role_id']])->first();
        $action = $this->request->getParam('action');
        if($role->role_id === 1){
            if (in_array($action, ['index', 'view', 'add', 'edit', 'delete', 'search', 'reportesales', 'reportestock'])) {
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
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['display', 'logout', 'login', 'loginfb']);
    }

    public function reportesales(){
        $this->paginate = [
            'contain' => ['VoucherTypes', 'Sellers' => ['Persons'], 'Clients' => ['Persons']
            , 'VoucherDetails' => ['Products' => ['ProductTypes']]]
        ];
        /*
        $this->paginate = [
            'contain' => ['VoucherHeaders' , 'Products']
        ];*/
        //$voucherDetails = $this->loadModel('VoucherDetails');
        /*$conn = ConnectionManager::get('default');
        $query = $conn->execute('SELECT issue_date FROM voucher_headers');
        $results = $query ->fetchAll('assoc');*/
        $query = $this->VoucherHeaders->query('SELECT vh.issue_date, SUM(vd.precio) FROM voucher_headers vh
            JOIN voucher_details vd ON vh.id = vd.voucher_detail_id 
            JOIN products prod ON prod.id = vd.product_id
            JOIN product_types pt ON pt.id = prod.product_type_id
            GROUP BY MONTH(vh.issue_date), YEAR(vh.issue_date)');
        $voucherHeaders = $this->paginate($query);
        //$voucherDetails = $this->VoucherHeaders->VoucherDetails->find('list', ['limit' => 200]);
        $this->set(compact('voucherHeaders'));
        
    }

    public function reportestock(){
        $this->paginate = [
            'contain' => ['VoucherTypes', 'Sellers' => ['Persons'], 'Clients' => ['Persons']
            , 'VoucherDetails' => ['Products' => ['ProductTypes']]]
        ];
        /*
        $this->paginate = [
            'contain' => ['VoucherHeaders' , 'Products']
        ];*/
        //$voucherDetails = $this->loadModel('VoucherDetails');
        /*$conn = ConnectionManager::get('default');
        $query = $conn->execute('SELECT issue_date FROM voucher_headers');
        $results = $query ->fetchAll('assoc');*/
        $query = $this->VoucherHeaders->query('SELECT vh.issue_date, SUM(vd.precio) FROM voucher_headers vh
            JOIN voucher_details vd ON vh.id = vd.voucher_detail_id 
            JOIN products prod ON prod.id = vd.product_id
            JOIN product_types pt ON pt.id = prod.product_type_id
            GROUP BY MONTH(vh.issue_date), YEAR(vh.issue_date)');
        $voucherHeaders = $this->paginate($query);
        //$voucherDetails = $this->VoucherHeaders->VoucherDetails->find('list', ['limit' => 200]);
        $this->set(compact('voucherHeaders'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {        
        $this->paginate = [
            'contain' => ['VoucherTypes', 'Sellers' => ['Persons'], 'Clients' => ['Persons'], 'VoucherDetails' => ['Products']]
        ];
        $voucherHeaders = $this->paginate($this->VoucherHeaders);

        $this->set(compact('voucherHeaders'));
    }

    /**
     * View method
     *
     * @param string|null $id Voucher Header id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {        
        

        $voucherHeader = $this->VoucherHeaders->get($id, [
            'contain' => ['VoucherTypes', 'Sellers' => ['Persons'], 'Clients' => ['Persons'], 'VoucherDetails' => ['Products']]
        ]);

        $this->set('voucherHeader', $voucherHeader);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $voucherHeader = $this->VoucherHeaders->newEntity();
        if ($this->request->is('post')) {
            $voucherHeader = $this->VoucherHeaders->patchEntity($voucherHeader, $this->request->getData(), [
                'associated' => [
                    'VoucherDetails'
                ]
            ]);
            if ($this->VoucherHeaders->save($voucherHeader)) {
                $this->Flash->success(__('The voucher header has been saved.'));

                return $this->redirect(['controller' => 'VoucherHeaders', 'action' => 'index']);
            }
            $this->Flash->error(__('The voucher header could not be saved. Please, try again.'));
        }
        $voucherTypes = $this->VoucherHeaders->VoucherTypes->find('list', ['limit' => 200]);
        $sellers = $this->VoucherHeaders->Sellers->find('all')->contain('Persons')->find('list', ['keyField'=>'id','valueField'=>'person.name','limit' => 200]);
        $clients = $this->VoucherHeaders->Clients->find('all')->contain('Persons')->find('list', ['keyField'=>'id','valueField'=>'person.name','limit' => 200]);

        $voucherDetails = $this->VoucherHeaders->VoucherDetails->find('list', ['limit' => 200]);
        $products = $this->VoucherHeaders->VoucherDetails->Products->find('list', ['limit' => 200]);

        $this->set(compact('voucherHeader', 'voucherTypes', 'sellers', 'clients', 'voucherDetails', 'products'));
        $this->set('_serialize', ['voucherHeader']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Voucher Header id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $voucherHeader = $this->VoucherHeaders->get($id, [
            'contain' => ['VoucherDetails']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $voucherHeader = $this->VoucherHeaders->patchEntity($voucherHeader, $this->request->getData(), [
                'associated' => [
                    'VoucherDetails'
                ]
            ]);
            if ($this->VoucherHeaders->save($voucherHeader)) {
                $this->Flash->success(__('The voucher header has been saved.'));

                return $this->redirect(['controller' => 'VoucherHeaders', 'action' => 'index']);
            }
            $this->Flash->error(__('The voucher header could not be saved. Please, try again.'));
        }
        $voucherTypes = $this->VoucherHeaders->VoucherTypes->find('list', ['limit' => 200]);
        $sellers = $this->VoucherHeaders->Sellers->find('all')->contain('Persons')->find('list', ['keyField'=>'id','valueField'=>'person.name','limit' => 200]);
        $clients = $this->VoucherHeaders->Clients->find('all')->contain('Persons')->find('list', ['keyField'=>'id','valueField'=>'person.name','limit' => 200]);

        $voucherDetails = $this->VoucherHeaders->VoucherDetails->find('list', ['limit' => 200]);
        $products = $this->VoucherHeaders->VoucherDetails->Products->find('list', ['limit' => 200]);

        $this->set(compact('voucherHeader', 'voucherTypes', 'sellers', 'clients', 'voucherDetails', 'products'));
        $this->set('_serialize', ['voucherHeader']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Voucher Header id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $voucherHeader = $this->VoucherHeaders->get($id);
        if ($this->VoucherHeaders->delete($voucherHeader)) {
            $this->Flash->success(__('The voucher header has been deleted.'));
        } else {
            $this->Flash->error(__('The voucher header could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
?>