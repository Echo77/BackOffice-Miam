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

    public function add()
    {   

        $this->request->is('post');
        print_r($this->request->data);
        $json = '[[{"id":1,"email":"nc","name":"dupond charles"},{"id":2,"email":"c","name":"a b"},{"id":3,"email":"","name":"ju bar"},{"id":4,"email":"vrre","name":"derw frere"}],[{"date":"20140130T114811Europe\/Paris(4,29,3600,0,1391078891)","id":1,"consommateur_id":1,"text":"this is a comment man!"},{"date":"20140130T120028Europe\/Paris(4,29,3600,0,1391079628)","id":2,"consommateur_id":2,"text":"bouh"},{"date":"20140130T170445Europe\/Paris(4,29,3600,0,1391097885)","id":3,"consommateur_id":3,"text":"mot, "},{"date":"20140130T170518Europe\/Paris(4,29,3600,0,1391097918)","id":4,"consommateur_id":4,"text":"ewfrsgdhr"}]]';
    	$comment = json_decode($json, true);
        /*
        $comment = json_decode($data);
        print_r($comment); */
        print_r($comment);
        $email = $comment[0][0]["email"];
        $date = $comment[1][0]["date"];
        $texte = $comment[1][0]["text"];
        $consommateur = $comment[0][0]["name"];
        echo "Email :";
        echo $email;
        echo "date :";
        echo $date;
        echo "texte";
        echo $texte;

    	$donnes[]= array('texte'=> $texte, 'date'=>$date, 'consommateur'=>$consommateur, 'email' => $email);  
        print_r($donnes);                  
        $this->Commentaire->saveMany($donnes); 
    }
 }
?>