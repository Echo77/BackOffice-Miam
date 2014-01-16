<?php
 class PlatsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('plats', $this->Plat->find('all'));
        $this->set('ingredients', $this->Plat->Ingredient->find('all'));
    }

    public function upPhoto($photo) {
        $id_last_plat = $this->Plat->find('first', array('fields' => array('Plat.id'),'order' => array('Plat.id' => 'desc')));
        $id_last_plat++;
        $ex = explode('.', $photo['name']);
        $ext = $ex[count($ex)-1];
        $name = 'photos_plats/plat_'.$id_last_plat['Plat']['id'].'.'.$ex[count($ex)-1];
        move_uploaded_file($photo['tmp_name'],'img/'.$name);

        return $name;
    }
	public function add() {
	 	/*
		 * La variable $menus est envoyé à la vue menus/add
		 */
		 
	 	$this->set('plats', $this->Plat->find('all'));
        $this->set('ingredients', $this->Plat->Ingredient->find('all'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $result = array();
            foreach ($data['Plat'] as $key => $value) {
                if ($key == 'photo') { 
                    $result[$key] = $this->upPhoto($value);
                }
                else {
                    $result[$key] = $value;
                }
            }

            $this->Plat->create();
            if ($this->Plat->save($result)) {
                $this->Session->setFlash(__('Votre plat a été sauvegardé.'));

                $id_plat = $this->Plat->find('first', array('fields' => array('Plat.id'),'order' => array('Plat.id' => 'desc')));

                foreach($this->request->data['IngredientPlat'] as $ingre){
                    $data_id[]= array('ingredient_id'=> $ingre, 'plat_id'=>$id_plat['Plat']['id']);                    
                }
                $this->Plat->IngredientsPlat->saveMany($data_id);
               return $this->redirect(array('action' => 'index'));
            } 
            $this->Session->setFlash(__('Impossible d\'ajouté un plat.'));
        }
    }
    public function edit($id = null) {
        $this->set('ingredients', $this->Plat->Ingredient->find('all'));

        if (!$id) {
            throw new NotFoundException(__('Invalid plat'));
        }

        $plat = $this->Plat->findById($id);
        $this->set('picture', $plat['Plat']['photo']);

        if (!$plat) {
            throw new NotFoundException(__('Invalid plat'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Plat->id = $id;

            if ($this->Plat->save($this->request->data)) {
                $this->Session->setFlash(__('Votre plat a été mis à jour.'));

            $plat_id = $id;

            $this->Plat->IngredientsPlat->deleteAll(array('plat_id'=>$plat_id), true); 
                foreach($this->request->data['IngredientPlat'] as $ingre){
                 $data_id[]= array('ingredient_id'=> $ingre, 'plat_id'=>$plat_id);
                }  
                 $this->Plat->IngredientsPlat->saveMany($data_id);

             return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Error !.')); 
        }

        if (!$this->request->data) {
            $this->request->data = $plat;
        }
    }

    public function delete($id) {
    $this->Plat->delete($id, true);
    $this->Session->setFlash(__('Votre plat a été supprimé.'));
    return $this->redirect(array('action' => 'index'));
    }
}
?>