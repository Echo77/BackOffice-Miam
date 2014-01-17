<?php
 class CommentairesController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
    	$this->set('commentaires', $this->Commentaire->find('all', array('order' => array('Commentaire.Date DESC'))));

    }

    public function delete($id) {
    	$this->Commentaire->delete($id, true);
    	$this->Session->setFlash(__('Commentaire supprimé.'));
    	return $this->redirect(array('action' => 'index'));
    }
 }
?>