<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Blog Division</title>

    <link rel="stylesheet" href="/styles/layout.css"  type="text/css" />
    <link rel="stylesheet" href="/styles/front.css"  type="text/css" />
    <link rel="stylesheet" href="/styles/toggleBox.css"  type="text/css" />
	<link href="/styles/datePicker.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="/scripts/jquery/jquery.js"></script>
    <script type="text/javascript" src="/scripts/jquery/interface.js"></script>
    <script type="text/javascript" src="/scripts/jquery/jcookie.js"></script>
    <script type="text/javascript" src="/scripts/datePicker.js"></script>
    <script type="text/javascript" src="/scripts/toggleBox.js"></script>
    <script type="text/javascript" src="/scripts/front.js"></script>
</head>

<body>
<div id="topPan">
  <div id="topHeaderPan">

   
     </div>
<div id="toprightPan">
	<ul>
		<li class="home">Główna</li>
		<li class="about"><a href="#">O autorach</a></li>
		<li class="contact"><a href="#">Kontakt</a></li>
	</ul>
</div>
</div>

  <div id="bodyleftPan">
  	<h2>Ewidencja oprogramowania</h2><br>
	<p class="greentext">Kliknij na link szczegóły żeby zobaczyć pełną informację o oprogramowaniu</p>

<table border="1" rules="all" width="90%" align="center" frame="">
<tr>
<th class="naglowek">Numer ewid.</th>
<th class="naglowek">Nazwa</th>
<th class="naglowek">Producent</th>
<th class="naglowek">Edytuj</th>
<th class="naglowek">Szczegóły</th>
</tr>
<?php foreach($this->softs as $soft): ?>
<tr>
<td><?php echo $this->escape($soft->idOprogramowanie);?></td>
<td><?php echo $this->escape($soft->nazwa);?></td>
<td><?php echo $this->escape($soft->producent);?></td>
<td>
<div align="center"><a href="/index/editSoft/id/<?php echo $soft->idOprogramowanie;?>">
<img src="/images/edit.gif" alt="edytuj dane o oprogramowaniu"></a>
</td>
<td>
<div align="center"><a href="/index/detailsSoft/id/<?php echo $soft->idOprogramowanie;?>">
<img src="/images/next.gif"</div></a>
</td>
</tr>
<?php endforeach; ?>
</table>

   
  </div>
  
  <div id="bodyrightPan">
    <div id="loginPan">
		<h2 id="loginToolsHeader">panel <span>sterowania</span></h2>
        
        <div id="loginToolsPan">
		
        
        
<div class="demo-show">
  <h3>
  <ul>
        <li class="nonregister"><img src="/images/mini_1.jpg" alt="" /></li>
        <li class="register"><a href="#">Zczytaj z komputera</a> </li>
  </ul>
  </h3>
  <div></div>
    <h3>
   <ul>
        <li class="nonregister"><img src="/images/mini_2.jpg" alt="" /></li>
        <li class="register"><a href="#">Dodaj oprogramowanie</a> </li>
    </ul>
  </h3>
  <div>
     
 
<form action="/index/addSoft" method="post" >
          
	<label>Nazwa</label>
	<div>
	<?php echo $this->formText('oprogramowanie_nazwa',null, array('id'=>'oprogramowanie_nazwa')); ?><font color="red">*</font>
	</div>
	<label>Producent</label>
	<div>
	<?php echo $this->formText('oprogramowanie_producent',null, array('id'=>'oprogramowanie_producent')); ?><font color="red">*</font>
	</div>
	<label>Wersja</label>
	<div>
	<?php echo $this->formText('oprogramowanie_wersja',null, array('id'=>'oprogramowanie_wersja')); ?>
	</div>
	<label>Numer seryjny</label>
	<div>
	<?php echo $this->formText('oprogramowanie_numer',null, array('id'=>'oprogramowanie_numer')); ?><font color="red">*</font>
	</div>
	<label>Klucz licencji</label>
	<div>
	<?php echo $this->formText('oprogramowanie_klucz',null, array('id'=>'oprogramowanie_klucz')); ?>
	</div>
	
	<label>Termin licencji</label>
	<div>
	<?php echo $this->formText('oprogramowanie_termin',null, array('id'=>'oprogramowanie_termin')); ?><font color="red">*</font>
	</div>
	<label>Typ licencji</label>
	<div>
	<?php echo $this->formText('oprogramowanie_typ',null, array('id'=>'oprogramowanie_typ')); ?>
	</div>
	<label>Ilosc stanowisk</label>
	<div>
	<?php echo $this->formText('oprogramowanie_ilosc',null, array('id'=>'oprogramowanie_ilosc')); ?>
	</div>
	<label>Komputer</label>
	<div>
	<select name="komputer_numer">
	<?php
	foreach ($this->komps as $key =>$value) {
		echo '<option value="'.$key.'">'.$value->nazwa.'</option>'."\n\t";
	}
	?>
	</select>
	</div>
	<label>URL scan</label>
	<div>
	<?php echo $this->formText('oprogramowanie_url',null, array('id'=>'oprogramowanie_url')); ?>
	</div>
<font color="red" size="1">	*- pole wymagane</font>
	<br>
	<?php echo $this->formSubmit('send','Dodaj oprogramowanie',array('id'=>'input_submit')); ?>
	</form>


<?php
if(	$this->validationSoftError){
?>
<div class="validacja">
<?php echo $this->validationSoftError;
?>
</div>
<?php
}
?>
</div>
</div>
<div class="demo-show">
  <h3>
    <ul>
        <li class="nonregister"><img src="/images/mini_2.jpg" alt="" /></li>
        <li class="register"><a href="#">Dodaj komputer</a> </li>
    </ul>
  </h3>
  <div>
    <form action="/index/addKomp" method="post" >
	<label>Nazwa</label>
	<div>
	<?php echo $this->formText('komputer_nazwa', null, array('id'=>'komputer_nazwa')); ?>
	</div>
	<label>Adres IP</label>
	<div>
	<?php echo $this->formText('komputer_numer', null, array('id'=>'komputer_numer')); ?>
	</div>

	<br>
	<?php echo $this->formSubmit('send','Dodaj komputer',array('id'=>'input_submit')); ?>
	</form>
	


<?php
if(	$this->validationKompError){
?>
<div class="validacja">
<?php echo $this->validationKompError;
?>
</div>
<?php
}
?>
</div>


<h3>
    <ul>
        <li class="nonregister"><img src="/images/mini_6.jpg" alt="" /></li>
        <li class="register"><a href="#">Usuń komputer</a> </li>
    </ul>
  </h3>
  <div>
	<form action="/index/deleteKomp" method="post" >
	<label for="komputer_nazwa">Nazwa komputera:</label>
	<select name="komputer_id">
	<?php
	foreach ($this->komps as $row) {
		echo '<option value="'.$row->idKomputer.'">'.$row->nazwa.'</option>'."\n\t";
	}
	?>
	</select>
	<?php echo $this->formSubmit('send','Usun komputer'); ?> 
	</form>
	</div>
	
<h3>
    <ul>
        <li class="nonregister"><img src="/images/mini_6.jpg" alt="" /></li>
        <li class="register"><a href="#">Usuń oprogramowanie</a> </li>
    </ul>
  </h3>
  <div>
	<form action="/index/deleteSoft" method="post" >
	<label for="oprogramowanie_nazwa">Nazwa oprogramowania:</label>
	
<select name="oprogramowanie_id">
	<?php
	foreach ($this->softs as $row) {
		echo '<option value="'.$row->idOprogramowanie.'">'.$row->nazwa.' o identyfikatorze: '.$row->idOprogramowanie.'</option>'."\n\t";
	}
	?>
	</select>
	<?php echo $this->formSubmit('send','Usun oprogramowanie'); ?> 
	</form>
	
	</div>
	
	
	
<h3>
    <ul>
        <li class="nonregister"><img src="/images/mini_3.jpg" alt="" /></li>
        <li class="register"><a href="#">Pokaż komputery</a> </li>
    </ul>
  </h3>
  <div align="center">
<table border="1" color="green" rules="all" width="70%">
<tr>
<th class="naglowek">Nazwa</th>
<th class="naglowek">Adres IP</th>
</tr>
<?php foreach($this->komps as $komp): ?>
<tr>
<td><?php echo $this->escape($komp->nazwa);?></td>
<td><?php echo $this->escape($komp->numerIp);?></td>
</td>
</tr>
<?php endforeach; ?>
</table>
	</div>


  <h3>
   <ul>
        <li class="nonregister"><img src="/images/mini_4.jpg" alt="" /></li>
        <li class="register"><a href="#">Generuj raport</a> </li>
    </ul>
  </h3>
  <div>
  <form action="" method="post" class="clear">
    <fieldset>
        <div>
            <label for="r_type">Typ raportu</label>
            <select  name="r_type">		
                <option value="0">Oprogramowanie</option>
                <option value="1">Komputery</option>
                <option value="2">Licencje</option>
    
            </select>
        </div>
        
        <input name="Input" type="submit" class="button" value="Pokaż" />
    </fieldset>
    </form> 
  </div>
  <h3>
   <ul>
        <li class="nonregister"><img src="/images/mini_5.jpg" alt="" /></li>
        <li class="register"><a href="#">Kończące się licencje</a> </li>
    </ul>
  </h3>
  <div></div>
</div>

	
    </div>
	<div id="servicesBottomPan">&nbsp;</div>
  </div>
  
</div>
<div id="footermainPan">
  <div id="footerPan">
  	<div id="footerlogoPan"><a href="index.php"><img src="/images/footerlogo.gif" title="Blog Division" alt="Blog Division" width="189" height="87" border="0" /></a></div>
	<ul>
  	<li><a href="#">Główna</a>| </li>
  	<li><a href="#">O autorach</a> | </li>
  	<li><a href="#">Ewidencja oprogramoania</a>| </li>
  	<li><a href="#">Dodaj oprogramowanie</a> | </li>
  	<li><a href="#">Dodaj komputer</a> |</li>
	<li><a href="#">Raporty</a> |</li>
    <li><a href="#">Licencje</a> |</li>
	<li><a href="#">Kontakt</a> </li>
	</ul>
	

	<ul class="validation">
  	<li>Valid:</li>
	<li><a href="http://validator.w3.org/check?uri=referer" target="_blank">XHTML</a></li>
	<li> Valid:</li>
	<li><a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank">CSS</a></li>
  </ul>
  </div>
</div>
</body>
</html>
