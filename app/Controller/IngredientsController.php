<?php
 class IngredientsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        if(isset($_GET['order']) && $_GET['order'] == 'DESC')
            $params = array('order' => 'Ingredient.nom DESC');
        else 
            $params = array('order' => 'Ingredient.nom');
        $this->set('ingredients', $this->Ingredient->find('all', $params));
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

    public function scripts() {
        $ingre = $this->Ingredient->find('all');

        foreach ($ingre as $key => $value) {
            echo "<p>";
            print_r($value);
            echo "</p>";
            $id = $value['Ingredient']['id'];
            $nom = $value['Ingredient']['nom'];
            
            $this->Ingredient->id = $id;

            $to_en = $this->translate($nom, "en");
            $to_es = $this->translate($nom, "es");
            $to_de = $this->translate($nom, "de");
            $to_zh = $this->translate($nom, "zh-CN");
            $data_translate[] = array('nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $id);
            $this->Ingredient->savemany($data_translate);

        }
    }
	public function add() {		 
	 	$this->set('ingredients', $this->Ingredient->find('all')); // Initialise la variable ingredients à la requete find all
		//$this->set('plats', $this->Menu->Plats->find('all'));
	 	//debug($this->request->data);
        if ($this->request->is('post')) {
            $this->Ingredient->create();

            $string = '';
            foreach ($this->request->data['Ingredient']['regime'] as $key => $value) {
            $string .= $value.'+';
            }
            $regime = substr($string, 0, -1);



            $id_ingre = $this->Ingredient->find('first', array('fields' => array('Ingredient.id'),'order' => array('Ingredient.id' => 'desc')));
            $nom = $this->request->data['Ingredient']['nom'];
            $to_en = $this->translate($nom, "en");
            $to_es = $this->translate($nom, "es");
            $to_de = $this->translate($nom, "de");
            $to_zh = $this->translate($nom, "zh-CN");
            $data_translate[] = array('regime'=>$regime, 'nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $id_ingre['Ingredient']['id']);
            $this->Ingredient->savemany($data_translate);
            $this->Session->setFlash(__('Impossible d\'ajouté un ingredient.'));
           // return $this->redirect(array('action' => 'index'));
        }
    }

    public function add_popup() {
        /*
         * La variable $ingredients est envoyé à la vue menus/add
         */
         
        $this->set('ingredients', $this->Ingredient->find('all')); // Initialise la variable ingredients à la requete find all
        //$this->set('plats', $this->Menu->Plats->find('all'));
        //debug($this->request->data);
        if ($this->request->is('post')) {
            $this->Ingredient->create();
            if ($this->Ingredient->save($this->request->data)) {
                $this->Session->setFlash(__('Votre ingredient a été sauvegardé.'));
                //echo "<script>openWin.close()</script>";
                //return $this->redirect(array('action' => 'index'));
            }
            /*
            *  GOOGLE TRANSLATE
            */

            $id_ingre = $this->Ingredient->find('first', array('fields' => array('Ingredient.id'),'order' => array('Ingredient.id' => 'desc')));
            $nom = $this->request->data['Ingredient']['nom'];
            $to_en = $this->translate($nom, "en");
            $to_es = $this->translate($nom, "es");
            $to_de = $this->translate($nom, "de");
            $to_zh = $this->translate($nom, "zh-CN");
            $data_translate[] = array('nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $id_ingre['Ingredient']['id']);
            $this->Ingredient->savemany($data_translate);
            $this->Session->setFlash(__('Impossible d\'ajouté un ingredient.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function delete($id) {
        $this->Ingredient->delete($id, true);
        $this->Session->setFlash(__('Votre ingredient a été supprimé.'));
        return $this->redirect(array('action' => 'index'));
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Ingredient->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Ingredient->id = $id;
            if ($this->Ingredient->save($this->request->data)) {
                $this->Session->setFlash(__('Votre ingredient a été mis a jour.'));
                //return $this->redirect(array('action' => 'index'));
                $nom = $this->request->data['Ingredient']['nom'];
                $to_en = $this->translate($nom, "en");
                $to_es = $this->translate($nom, "es");
                $to_de = $this->translate($nom, "de");
                $to_zh = $this->translate($nom, "zh-CN");
                $data_translate[] = array('nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $id);
                $this->Ingredient->savemany($data_translate);
                $this->Session->setFlash(__('Impossible d\'ajouté un ingredient.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Error.'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }



 }
?>