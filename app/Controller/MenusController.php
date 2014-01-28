<?php
 class MenusController extends AppController {
    public $helpers = array('Html', 'Form');



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
        $menus = $this->Menu->find('all');

        foreach ($menus as $key => $value) {
            echo "<p>";
            print_r($value);
            echo "</p>";
            $id = $value['Menu']['id'];
            $nom = $value['Menu']['nom'];
            
            $this->Menu->id = $id;

            $to_en = $this->translate($nom, "en");
            $to_es = $this->translate($nom, "es");
            $to_de = $this->translate($nom, "de");
            $to_zh = $this->translate($nom, "zh-CN");
            $data_translate[] = array('nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $id);
            $this->Menu->savemany($data_translate);

        }
    }

    public function index() {

        if(isset($_GET['ordername']) && $_GET['ordername'] == 'DESC')
            $params = array('order' => 'Menu.nom DESC');
        else if (isset($_GET['ordername']) && $_GET['ordername'] == 'ASC')
            $params = array('order' => 'Menu.nom');
        else if(isset($_GET['orderhor']) && $_GET['orderhor'] == 'true') {
            $params = array('order' => 'Menu.horaire');
        } else {
            $params = array('order' => 'Menu.nom');
        }
        $this->set('menus', $this->Menu->find('all', $params));

        $this->set('plats', $this->Menu->Plat->find('all'));
    }

	public function add() 
    {
                 /*
                 * La variable $menus est envoyé à la vue menus/add
                 */
                 
        $this->set('menus', $this->Menu->find('all'));
        $this->set('plats', $this->Menu->Plat->find('all'));


        //retourne tous les types de catégories
        $categories = $this->Menu->Plat->find('all', array('fields' => 'DISTINCT Plat.categorie'));
        $list_cat = array();
        foreach ($categories as $key => $value) {
            $list_cat[] = $value['Plat']['categorie'];
        }
        $this->set('categories', $list_cat);

        if ($this->request->is('post')) 
        {

            $this->Menu->create();
            if(isset($this->request->data['MenuPlat']))
            {
                if ($this->Menu->save($this->request->data)) 
                {
                    $this->Session->setFlash(__('Votre menu a été sauvegardé.'));

                    $id_menu = $this->Menu->find('first', array('fields' => array('Menu.id'),'order' => array('Menu.id' => 'desc')));

                    $nom = $this->request->data['Menu']['nom'];
                    $to_en = $this->translate($nom, "en");
                    $to_es = $this->translate($nom, "es");
                    $to_de = $this->translate($nom, "de");
                    $to_zh = $this->translate($nom, "zh-CN");
                    $data_translate[] = array('nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $id_menu['Menu']['id']);
                    $this->Menu->savemany($data_translate);

                    foreach($this->request->data['MenuPlat'] as $plat){
                         $data_id[]= array('plat_id'=> $plat, 'menu_id'=>$id_menu['Menu']['id']);
                    }
                    $this->Menu->MenusPlat->saveMany($data_id);
                   return $this->redirect(array('action' => 'index'));
                $this->Session->setFlash(__('Impossible d\'ajouté un menu.'));
            }
            }
            else
            {
                echo "Pas de plat dans votre menu.";
            } 
        }
    }
    public function edit($id = null) {
        $this->set('plats', $this->Menu->Plat->find('all'));

        //retourne tous les types de catégories
        $categories = $this->Menu->Plat->find('all', array('fields' => 'DISTINCT Plat.categorie'));
        $list_cat = array();
        foreach ($categories as $key => $value) {
            $list_cat[] = $value['Plat']['categorie'];
        }
        $this->set('categories', $list_cat);

        if (!$id) {
            throw new NotFoundException(__('Invalid menu'));
        }

        $menu = $this->Menu->findById($id);
        if (!$menu) {
            throw new NotFoundException(__('Invalid menu'));
        }

        $comp = array();
        foreach ($menu['Plat'] as $key => $value) {
            $comp[] = $value['id'];
        }
        $this->set('composants', $comp);

        if ($this->request->is(array('post', 'put'))) {
            $this->Menu->id = $id;

            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('Votre menu a été mis à jour.'));

                $nom = $this->request->data['Menu']['nom'];
                $to_en = $this->translate($nom, "en");
                $to_es = $this->translate($nom, "es");
                $to_de = $this->translate($nom, "de");
                $to_zh = $this->translate($nom, "zh-CN");
                $data_translate[] = array('nom_en' => $to_en, 'nom_es' => $to_es, 'nom_zh' => $to_zh, 'nom_de' => $to_de, 'id'=> $id);
                $this->Menu->savemany($data_translate);

                $menu_id = $id;
                if(isset($this->request->data['MenuPlat']))
                {
                    if($this->request->data['MenuPlat'])
                    {
                    $this->Menu->MenusPlat->deleteAll(array('menu_id'=>$menu_id), true); 
                        foreach($this->request->data['MenuPlat'] as $plat){
                         $data_id[]= array('plat_id'=> $plat, 'menu_id'=>$menu_id);
                        }  
                         $this->Menu->MenusPlat->saveMany($data_id);
                         return $this->redirect(array('action' => 'index'));
                    }
                    $this->Session->setFlash(__('Impossible d\'ajouté un menu.')); 
                }
                else
                {
                    echo "Pas de plats dans votre menu.";
                }
            }
        }

        if (!$this->request->data) {
            $this->request->data = $menu;
        }
    }
    public function delete($id) {
    $this->Menu->delete($id, true);
    $this->Session->setFlash(__('Votre menu a été supprimé.'));
    return $this->redirect(array('action' => 'index'));
    }

 }
?>