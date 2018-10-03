<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Component\FlashComponent;
use Cake\Network\Session;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
  public function initialize()
  {
      parent::initialize();
      $this->Auth->allow(['logout']);
  }

  public function isAuthorize($user)
      {

        //users can only edit their profile
        if(in_array($this->request->getParam['action'],['edit'])){
          if($user['role'] === $this->Auth->user('role') && $user['id'] === $this->Auth->user('id') ){
            return true;
          }

        }

        //users can only edit their store

        return parent::isAuthorize($user);
      }

  public function login()
        {

          if($this->Auth->User('id') !== null){
                return $this->redirect($this->Auth->redirectUrl());
          }

            if ($this->request->is('post')) {
              $user = $this->Auth->identify();
                if ($user) {

                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                //debug($this->request);
                $this->Flash->error(__('Invalid email or password, try again'));
            }
        }

        /**
        *
        *
        **/

        public function logout()
      {
        $session = new Session();
        $session->destroy('cart');
          return $this->redirect($this->Auth->logout());
      }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        $name = $this->Auth->User('username');
        $this->set(compact('users', 'name'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if($this->isAuthorize($user)):
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
      else
        $this->Flash->error(__('Not Authorised'));
      endif;
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
