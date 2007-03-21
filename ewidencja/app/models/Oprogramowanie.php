<?php
class Soft_Validation_Exception extends Exception{}

class Oprogramowanie extends Zend_Db_Table
{
	protected $_primary = 'id_oprogramowanie';

	/*
	 * Funkcja sprawdza czy dany login istnieje juz w bazie danych
	 */
	public function ifNazwa($nazwa)
	{
		$db = $this->getAdapter();
		$where = $db->quoteInto('nazwa = ?',$nazwa);
		$row = $this->fetchRow($where);
			if($row->idOprogramowanie == NULL) 
			return true; 
				else 
					return false;
	}
	/*
	 * Funkcja kontroluje poprawnosc danych podczas
	 * zakladania konta uzytkownika
	 */
	public function insert($data)

    {
	
	
		if (empty($data['nazwa']) && empty($data['producent']) && empty($data['termin_licencji']) && empty($data['numer_seryjny'])){
			throw new Soft_Validation_Exception('Zadne pole wymagane nie zostalo wypelnione!!!');
		}
		if (empty($data['nazwa'])){
			throw new Soft_Validation_Exception('Nie podales nazwy oprogramowania! Pole wymagane!!!');
		}
		if (empty($data['producent'])){
			throw new Soft_Validation_Exception('Nie podales producenta oprogramowania! Pole wymagane!!!');
		}
		if (empty($data['nr_seryjny'])){
			throw new Soft_Validation_Exception('Nie podales nmeru seryjnego! Pole wymagane!!!');
		}
		if (empty($data['termin_licencji'])){
			throw new Soft_Validation_Exception('Nie podales terminu licencji! Pole wymagane!!!');
		}
		if (empty($data['termin_licencji'])){
			throw new Soft_Validation_Exception('Nie podales terminu licencji! Pole wymagane!!!');
		}
      
       if (!eregi('[0-9]',$data['ilosc_stanowisk'])
			 ) {
        	throw new Soft_Validation_Exception('Niepoprawna liczba stanowisk!');
        }    
        if (!eregi('[0-9-]',$data['termin_licencji'])
			 ) {
        	throw new Soft_Validation_Exception('Niepoprawna data!');
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