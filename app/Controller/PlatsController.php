<?php
 class PlatsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $params = array('order' => 'Plat.nom');
        if(isset($_GET['ordercat']) && $_GET['ordercat'] == 'DESC') {
            $params = array('order' => 'Plat.categorie DESC');
        }
        else {
            $params = array('order' => 'Plat.categorie');
            if(isset($_GET['ordernom']) && $_GET['ordernom'] == 'DESC')
                $params = array('order' => 'Plat.nom DESC');
            else
                $params = array('order' => 'Plat.nom');
            if(isset($_GET['ordercat']) && $_GET['ordercat'] == 'ASC')
                $params = array('order' => 'Plat.categorie');
        }
        $this->set('plats', $this->Plat->find('all', $params));

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


    public function translate($text, $language){
        $apiKey = 'AIzaSyBwcVX5llQAf3tkZllBoYK-jZ26ZI4y9bU';
        $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=fr&target='.$language.'';
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);                 
        $responseDecoded = json_decode($response, true);
        curl_close($handle);
        return $responseDecoded['data']['translations'][0]['translatedText'];
    }


    public function transfert() {
        echo "Données transmises vers la tablette";
        $plats = $this->Plat->find('all');
        $ingredients = $this->Plat->Ingredient->find('all');
        $ingredients_plats = $this->Plat->IngredientsPlat->find('all');
        $menus_plats = $this->Plat->MenusPlat->find('all');
        $menu = $this->Plat->Menu->find('all');
        $tableau = array($plats, $ingredients, $ingredients_plats, $menus_plats, $menu);
        print_r(json_encode($tableau));
       // print_r($tableau);   
       }     

	public function add() {
		 
	 	$this->set('plats', $this->Plat->find('all'));
        $this->set('ingredients', $this->Plat->Ingredient->find('all'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $result = array();
            /*
            * Upload Photo
            */
            foreach ($data['Plat'] as $key => $value) {
                if ($key == 'photo') { 
                    $result[$key] = $this->upPhoto($value);
                }
                else {
                    $result[$key] = $value;
                }
            }

            $this->Plat->create();
            if(isset($this->request->data['IngredientPlat'])) // Verifie s'il y a des ingredients
            {
                if ($this->Plat->save($result) ) 
                {
                    $this->Session->setFlash(__('Votre plat a été sauvegardé.'));

                    $id_plat = $this->Plat->find('first', array('fields' => array('Plat.id'),'order' => array('Plat.id' => 'desc')));

                    foreach($this->request->data['IngredientPlat'] as $ingre){
                        $data_id[]= array('ingredient_id'=> $ingre, 'plat_id'=>$id_plat['Plat']['id']);                    
                    }
                    $this->Plat->IngredientsPlat->saveMany($data_id);

                    $nom = $this->request->data['Plat']['nom'];
                    $to_en = $this->translate($nom, "en");
                    $to_es = $this->translate($nom, "es");
                    $to_de = $this->translate($nom, "de");
                    $to_zh = $this->translate($nom, "zh-CN");
                    $data_translate[] = array('nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $id_plat['Plat']['id']);
                    $this->Plat->savemany($data_translate);

                   return $this->redirect(array('action' => 'index'));  
                } 
                $this->Session->setFlash(__('Impossible d\'ajouté un plat.')); 
            }
            else 
            {               
                echo "Format de l'image incorrect ou le plat n'a pas d'ingredients";
            }   
        }
    }
    public function add_popup() {
        $this->set('plats', $this->Plat->find('all'));
        $this->set('ingredients', $this->Plat->Ingredient->find('all'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $result = array();
            /*
            * Upload Photo
            */
            foreach ($data['Plat'] as $key => $value) {
                if ($key == 'photo') { 
                    $result[$key] = $this->upPhoto($value);
                }
                else {
                    $result[$key] = $value;
                }
            }
            $this->Plat->create();
            if(isset($this->request->data['IngredientPlat'])) // Verifie s'il y a des ingredients
            {
                if ($this->Plat->save($result)) 
                {
                    $this->Session->setFlash(__('Votre plat a été sauvegardé.'));

                    $id_plat = $this->Plat->find('first', array('fields' => array('Plat.id'),'order' => array('Plat.id' => 'desc')));

                    foreach($this->request->data['IngredientPlat'] as $ingre){
                        $data_id[]= array('ingredient_id'=> $ingre, 'plat_id'=>$id_plat['Plat']['id']);                    
                    }
                    $this->Plat->IngredientsPlat->saveMany($data_id);

                    $nom = $this->request->data['Plat']['nom'];
                    $to_en = $this->translate($nom, "en");
                    $to_es = $this->translate($nom, "es");
                    $to_de = $this->translate($nom, "de");
                    $to_zh = $this->translate($nom, "zh-CN");
                    $data_translate[] = array('nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $id_plat['Plat']['id']);
                    $this->Plat->savemany($data_translate);

                   return $this->redirect(array('action' => 'index'));  
                } 
                $this->Session->setFlash(__('Impossible d\'ajouté un plat.')); 
            }
            else 
            {               
                echo "Format de l'image incorrect ou le plat n'a pas d'ingredients";
            }
        }
    }
    public function edit($id = null) {
        $this->set('ingredients', $this->Plat->Ingredient->find('all'));

        if (!$id) {
            throw new NotFoundException(__('Invalid plat'));
        }

        $plat = $this->Plat->findById($id);

        $this->set('picture', $plat['Plat']['photo']);
        $comp = array();
        foreach ($plat['Ingredient'] as $key => $value) {
            $comp[] = $value['id'];
        }
        $this->set('composants', $comp);

        if (!$plat) {
            throw new NotFoundException(__('Invalid plat'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Plat->id = $id;
            
            $data = $this->request->data;


            $result = array();
            foreach ($data['Plat'] as $key => $value) {
                if ($key == 'photo') { 
                    if ($value['tmp_name']) {
                        $result['Plat'][$key] = $this->upPhoto($value);
                    } else {
                        $result['Plat'][$key] = $plat['Plat']['photo'];
                    }

                }
                else {
                    $result['Plat'][$key] = $value;
                }
            }
            foreach ($data['IngredientPlat'] as $key => $value) {
                $result['IngredientPlat'][] = $value;
            }

            if(isset($result['IngredientPlat'])) {
                if ($this->Plat->save($result)) {
                    $this->Session->setFlash(__('Votre plat a été mis à jour.'));
                    $plat_id = $id;
                    $this->Plat->IngredientsPlat->deleteAll(array('plat_id' => $plat_id), true); 
                
                    $this->Plat->IngredientsPlat->deleteAll(array('plat_id' => $plat_id), true); 
                    foreach($result['IngredientPlat'] as $ingre) {
                        $data_id[]= array('ingredient_id' => $ingre, 'plat_id' => $plat_id);
                    }  
                    $this->Plat->IngredientsPlat->saveMany($data_id);

                    $nom = $this->request->data['Plat']['nom'];
                    $to_en = $this->translate($nom, "en");
                    $to_es = $this->translate($nom, "es");
                    $to_de = $this->translate($nom, "de");
                    $to_zh = $this->translate($nom, "zh-CN");
                    $data_translate[] = array('nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $plat_id);
                    $this->Plat->savemany($data_translate);

                    return $this->redirect(array('action' => 'index'));
                    $this->Session->setFlash(__('Error !'));
                }
            $this->Session->setFlash(__('Impossible d\'enregistrer le plat.')); 
            } else {
                echo "Pas d'ingredients dans votre plat";
            }
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
/*
* GCM
*/
}
?>