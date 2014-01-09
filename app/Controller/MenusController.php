<?php
 class MenusController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('menus', $this->Menu->find('all'));
		//$this->set('menus/add', $this->Menu->find('all'));
    }
	 public function add() {
	 	/*
		 * La variable $menus est envoyé à la vue menus/add
		 */
		 
	 	$this->set('menus', $this->Menu->find('all'));
		//$this->set('plats', $this->Menu->Plats->find('all'));
	 	debug($this->request->data);
        if ($this->request->is('post')) {
            $this->Menu->create();
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('Votre menu a été sauvegardé.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Impossible d\'ajouté un menu.'));
        }
}
 }
?>