<?php
 class IngredientsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('ingredients', $this->Ingredient->find('all'));
        //$this->set('ingredients_bis', $this->Ingredient->Plat->find('all'));
		//$this->set('menus/add', $this->Menu->find('all'));
       // $this->User->Recipe->someFunction();
    }
	 public function add() {
	 	/*
		 * La variable $ingredients est envoyé à la vue menus/add
		 */
		 
	 	$this->set('ingredients', $this->Ingredient->find('all')); // Initialise la variable ingredients à la requete find all
		//$this->set('plats', $this->Menu->Plats->find('all'));
	 	debug($this->request->data);
        if ($this->request->is('post')) {
            $this->Ingredient->create();
            if ($this->Ingredient->save($this->request->data)) {
                $this->Session->setFlash(__('Votre ingredient a été sauvegardé.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Impossible d\'ajouté un ingredient.'));
        }
}
 }
?>