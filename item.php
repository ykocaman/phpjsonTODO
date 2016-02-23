<?php

class Item{
	public 	$id;
	public 	$content;
	public 	$open_date;
	public 	$complete_date;
	public 	$priority;
	public 	$next; // bir sonraki bilgiyi tutcak olan değişken.
	
	private $priDetail = array('success','info','warning','danger');
	private $buttonActions  = array('incpriority' =>'Aciliyeti Artır', 'decpriority' =>'Aciliyeti Düşür','delete' => 'Sil' );

	function __construct() {
		$this->open_date = date('d-m-Y H:i:s');
	}

	public function getPriority(){
		$priority = $this->priority > 3 ? 3 : $this->priority;
		return $this->priDetail[$priority ];
	}

	public function complete(){
		$this->complete_date = date('d-m-Y H:i:s');
	}

	public function incPriority(){
		$this->priority++;
	}

	public function decPriority(){
		$this->priority--;
		if($this->priority < 0) $this->priority = 0;
	}

	public function getHtml(){
		$html = '
			   <tr class="'. $this->getPriority(). '">
			      <td scope="row">'.$this->id.'</td>
			      <td>'.$this->content.'</td>
			      <td>'.$this->priority.'</td>
			      <td>'.$this->open_date.'</td>
			      <td>'.($this->complete_date ? : 'Açık').'</td>
			      <td>'.($this->complete_date ? 
			      	'<a href="?id='.$this->id.'&action=active" type="button" class="btn btn-danger btn-sm">Aktifle</a>'
			      	:
		      	 	'<a href="?id='.$this->id.'&action=complete" type="button" class="btn btn-success btn-sm">Kapat</a>'
			      	).
					' 
					<div class="btn-group">
					  <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
					    İşlem <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" role="menu">';

					  foreach ($this->buttonActions as $key => $action) {
					  	$html.= '<li><a href="?id='.$this->id.'&action='.$key.'">'.$action.'</a></li>';
					  }
					   
		$html .=	  '</ul>
					</div>
			      </td>
			    </tr>';
	    return $html;
	}


}