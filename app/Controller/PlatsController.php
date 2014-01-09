<?php
 class PlatsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
       // $this->Plat->recursive=1;
        $this->set('plats', $this->Plat->find('all'));
        $this->set('ingredients', $this->Plat->Ingredient->find('all'));
    }
	 public function add() {
	 	/*
		 * La variable $menus est envoyé à la vue menus/add
		 */
		 
	 	$this->set('plats', $this->Plat->find('all'));
        $this->set('ingredients', $this->Plat->Ingredient->find('all'));

		//$this->set('plats', $this->Plat->find('all'));
	 	debug($this->request->data);
        if ($this->request->is('post')) {

            $this->Plat->create();
            if ($this->Plat->save($this->request->data)) {
                $this->Session->setFlash(__('Votre plat a été sauvegardé.'));
                // Récupère le nom du plat enregistré

                $id_plat = $this->Plat->find('first', array('fields' => array('Plat.id'),'order' => array('Plat.id' => 'desc')));
              //  echo $id_plat['Plat']['id'];
                //echo $licorne;
                // Récupère les id des ingrédients associés au plats

                foreach($this->request->data['IngredientPlat'] as $ingre){
                 $data_id[]= array('ingredient_id'=> $ingre, 'plat_id'=>$id_plat['Plat']['id']);
                
                
                } 
                $this->Plat->IngredientsPlat->saveMany($data_id);
               return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Impossible d\'ajouté un plat.'));
            //if ($this->Plat->IngredientPlat->saveall($this->request->data['IngredientsPlats'])) {
             


            //}
            
        }
    }
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid plat'));
        }

        $post = $this->Plat->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid plat'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Plat->save($this->request->data)) {
                $this->Session->setFlash(__('Votre plat a été mis à jours.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Error !.'));
        }

        if (!$this->request->data) {
            $this->request->data = $plat;
        }
    }
 }
?>