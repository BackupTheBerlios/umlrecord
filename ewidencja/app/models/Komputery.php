<?php
class Komp_Validation_Exception extends Exception{}

class Komputery extends Zend_Db_Table
{
	protected $_primary = 'id_komputer';


	/*
	 * Funkcja sprawdza czy dany komputer istnieje juz w bazie danych
	 */
	public function ifNazwa($nazwa)
	{
		$db = $this->getAdapter();
		$where = $db->quoteInto('nazwa = ?',$nazwa);
		$row = $this->fetchRow($where);
			if($row->idKomputer == NULL) 
			return true; 
				else 
					return false;
	}
		public function ifAdres($adres)
	{
		$db = $this->getAdapter();
		$where = $db->quoteInto('numer_ip = ?',$adres);
		$row = $this->fetchRow($where);
			if($row->idKomputer == NULL) 
			return true; 
				else 
					return false;
	}
	/*
	 * Funkcja kontroluje poprawnosc danych podczas
	 * dodawania komputera
	 */
	public function insert($data)

    {
		if (!$this->ifNazwa($data['nazwa'])){
			throw new Komp_Validation_Exception('Komputer o podanej nazwie juz istnieje.');
		}
    	if (!$this->ifAdres($data['numer_ip'])){
			throw new Komp_Validation_Exception('Komputer o podanym adresie IP juz istnieje.');
		}
     	if (empty($data['nazwa']) && empty($data['numer_ip'])) {
        	throw new Komp_Validation_Exception('Nie podales nazwy ani adresu IP komputera!');
        }
     	
        if (empty($data['nazwa'])) {
        	throw new Komp_Validation_Exception('Nie podales nazwy komputera!');
        } 
         
        if (empty($data['numer_ip'])) {
        	throw new Komp_Validation_Exception('Nie podales adresu IP komputera!');
        }
        
		if ((strlen($data['numer_ip'])>15) ||(strlen($data['numer_ip'])<7) || 
		(!eregi('[0-9.]',$data['numer_ip']))
			 ) {
        	throw new Komp_Validation_Exception('To nie jest poprawy adres IP!');
        }
       
       
		
              
        return parent::insert($data);
    }

    /*
     * Funkacja nadpisuje metode delete
     */
    
   public function delete($where)
    {
		
		return parent::delete($where);
		
    }
     

}
?>