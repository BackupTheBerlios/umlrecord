<?php
include '../app/models/Komputery.php';
include '../app/models/Oprogramowanie.php';
include '../app/models/KompOpr.php';

class IndexController extends Hamster_Controller_Action 
{
    /**
     * Akcja domyslna dla     http://localhost/index/ 	
     * lub 		http://localhost/
     */
    public function indexAction()
    {     
        
      $kompy = new Komputery;
      $soft= new Oprogramowanie;
      	$this->view->validationKompError = $this->_getParam('validationKompError');
       $this->view->validationSoftError = $this->_getParam('validationSoftError');
		$this->view->komps = $kompy->fetchAll();
		$this->view->softs = $soft->fetchAll();
       $this->view->body = $this->view->render('/index.php');
		$this->display();

    }
    /**
     * Akcja odpowiedzialna za dodanie nowego komputera
     */
    public function addKompAction()
    {   

       	$post = new Zend_Filter_Input($_POST);
       	$kompy = new Komputery();
		$data = array(
    		'nazwa' => $post->getRaw('komputer_nazwa'),
   			'numer_ip' => $post->getRaw('komputer_numer')
   		 	
   			
		);
		print_r($_POST);
		try {
			$id = $kompy->insert($data);
			$this->_forward('index','index');
		} catch (Komp_Validation_Exception $e){
			$this->_forward('index','index', array('validationKompError'=>$e->getMessage()));
		}
		print_r($_POST);
    }
    /**
     * Akcja odpowiedzialna za usuniecie konta ankietera
     */
    public function deleteKompAction()
    {   
		
		$post = new Zend_Filter_Input($_POST);
		$kompy = new Komputery;
		$db = $kompy->getAdapter();
		$where = $db->quoteInto('id_komputer = ?', $post->getRaw('komputer_id'));
		$rows_affected = $kompy->delete($where);
		$this->_forward('index','index');
		
    }    
 /* Funkcja realizujaca dodanie oprogramowania
  * 
  */
     public function addSoftAction()
    {   

       	$post = new Zend_Filter_Input($_POST);
       	$soft = new Oprogramowanie();

		$data = array(
    		'nazwa' => $post->getRaw('oprogramowanie_nazwa'),
   			'producent' => $post->getRaw('oprogramowanie_producent'),
   			'wersja' => $post->getRaw('oprogramowanie_wersja'),
   			'nr_seryjny' => $post->getRaw('oprogramowanie_numer'),
   			'klucz_licencji' => $post->getRaw('oprogramowanie_klucz'),
   			'termin_licencji' => $post->getRaw('oprogramowanie_termin'),
   			'typ_licencji' => $post->getRaw('oprogramowanie_typ'),
   			'ilosc_stanowisk' => $post->getRaw('oprogramowanie_ilosc'),
   			'url_scan' => $post->getRaw('oprogramowanie_url')
   				
		);
		try {
			$id = $soft->insert($data);
			$this->_forward('index','index');
		} catch (Soft_Validation_Exception $e){
			$this->_forward('index','index', array('validationSoftError'=>$e->getMessage()));
		}
		
		$komOpr = new KompOpr; 
		$data = array( 
			'id_komputer' => $post->getInt('komputery'),
			'id_oprogramowanie' => $post->getRaw('oprogramowanie_nazwa')
			
		);
			
			
		 try {$komOpr->insert($data); 
		 	$this->_forward('index','index');
		 }catch (Soft_Validation_Exception $e){
			$this->_forward('index','index', array('validationSoftError'=>$e->getMessage())); 
    }
    } 
    
    public function deleteSoftAction()
    {   
		
		$post = new Zend_Filter_Input($_POST);
		$soft = new Oprogramowanie;
		$db = $soft->getAdapter();
		$where = $db->quoteInto('id_oprogramowanie = ?', $post->getRaw('oprogramowanie_id'));
		$rows_affected = $soft->delete($where);
		$this->_forward('index','index');
		
    }   
 
     public function editSoftAction()
    {   
		
		$post = new Zend_Filter_Input($_POST);
		$soft = new Oprogramowanie;
		$db = $soft->getAdapter();
		$where = $db->quoteInto('id_oprogramowanie = ?', $post->getRaw('oprogramowanie_id'));
		$rows_affected = $soft->delete($where);
		$this->_forward('index','index');
		
    }   
 

  
}
?>