<?php
 class MenusController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
/*


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


        */
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
                        {
                        foreach($this->request->data['MenuPlat'] as $plat){
                         $data_id[]= array('plat_id'=> $plat, 'menu_id'=>$id_menu['Menu']['id']);
                        } 
                        $this->Menu->MenusPlat->saveMany($data_id);
                        return $this->redirect(array('action' => 'index'));
                        }
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
           // $this->Plat->delete($id, true);
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('Votre menu a été mis à jour.'));

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