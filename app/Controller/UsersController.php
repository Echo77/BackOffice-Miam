<?php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout');
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
        if ($this->Auth->login($this->request->data)) {
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
        }
    }
}

    public function logout() {
    return $this->redirect($this->Auth->logout());
}
}
?>