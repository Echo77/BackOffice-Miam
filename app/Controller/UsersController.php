<?php
class UsersController extends AppController {

    var $name = 'Users';
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','logout');
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }


    public function login() {
    if ($this->request->is('post')) {
        $data = $this->request->data['User'];

        $params = array('conditions' => array('User.username' => $data['username']));
        $rep = $this->User->find('all', $params);


        if(isset($rep[0]['User']['password']) && $data['password'] == $rep[0]['User']['password'])
        {
            if ($this->Auth->login($this->request->data)) {
                return $this->redirect($this->Auth->redirect());
            }
        } else {
            echo '<p style="margin-left: 30px;">Nom d\'user ou mot de passe invalide, réessayer</p>';
        }
    }
}

    public function logout() {
    return $this->redirect($this->Auth->logout());
}
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'user n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }

}
?>