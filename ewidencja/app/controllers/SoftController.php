<?php
include '../app/models/Komputery.php';
include '../app/models/Oprogramowanie.php';
include '../app/models/KompOpr.php';

class SoftController extends Hamster_Controller_Action 
{
    /**
     * Akcja domyslna dla     http://localhost/index/ 	
     * lub 		http://localhost/
     */
    
    public function indexAction()
    {
    	echo view->render('index.tpl.php');
    	$this->display();
    }
    public function softAction()
    {     
        
      $kompy = new Komputery;
      $soft= new Oprogramowanie;
      	$this->view->validationKompError = $this->_getParam('validationKompError');
       $this->view->validationSoftError = $this->_getParam('validationSoftError');
		$this->view->komps = $kompy->fetchAll();
		$this->view->softs = $soft->fetchAll();
       $this->view->body = $this->view->render('/szczegoly.php');
		$this->display();

    }
   

  


  
}
?>