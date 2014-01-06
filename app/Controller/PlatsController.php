<?php
 class PlatsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('menus', $this->Plat->find('all'));
		//$this->set('menus/add', $this->Menu->find('all'));
    }
	 public function add() {
	 	/*
		 * La variable $menus est envoyé à la vue menus/add
		 */
		 
	 	$this->set('plats', $this->Plat->find('all'));
		//$this->set('plats', $this->Plat->find('all'));
	 	debug($this->request->data);
        if ($this->request->is('post')) {
            $this->Plat->create();
            if ($this->Plat->save($this->request->data)) {
                $this->Session->setFlash(__('Votre menu a été sauvegardé.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Impossible d\'ajouté un menu.'));
        }
}
 }
?>