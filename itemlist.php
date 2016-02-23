<?php include 'item.php';

class ItemList {
	public $first = null;
	public $pointer = 0;

	private $dataFile = 'list.json';

	function __construct() {
			$this->dataFile = getcwd().'/'.$this->dataFile;

		if( file_exists($this->dataFile))
	     $saved = file_get_contents($this->dataFile);

	     if(empty($saved)) {// kayıtlı data yok ise rasgele 10 tane oluşturuyoruz. 
	     		$this->generateRandom();
	     		return;	
 			}

    	$first = json_decode($saved);

    	$pointer = $first;
		while($pointer != null){

				$item = new Item();
  				$item->id=$pointer->id;
  				$item->content =$pointer->content;
  				$item->open_date =$pointer->open_date;
  				$item->complete_date = $pointer->complete_date;
  				$item->priority = $pointer->priority;

				if($_GET['id'] == $item->id){ // eğer seçili kayıt üzerinde işlem varsa yap.
				switch ($_GET['action']) {
					case 'delete':
						$pointer = $pointer->next;
						continue 2; // silmek için ilgili kayıdı yüklemezsek, sınıf yokedildigi zaman kaydetmeyecektirde.
						break;
					case 'complete':
						$item->complete();
					break;
					case 'active':
						$item->complete_date = null;
					break;
					case 'incpriority':
						$item->incPriority();
					break;
					case 'decpriority':
						$item->decPriority();
					break;
					}
				}
  				
		  		$this->add($item);
		  		$pointer = $pointer->next;

		}

		$content = $_POST['content']; // eğer yeni veri ekleme talebi gelmişse
		if(!empty($content)){
			$item = new Item();

			$converted =  '<h3>'.nl2br($content);
			if(strpos($content,'<br />') !== false)
				$item->content = $converted.'</h3>';
			else
			$item->content = preg_replace('/<br \/>/', '</h3>',$converted,1);

			$item->priority = intval($_POST['priority']);
			$this->add($item);


		}
	 //    var_dump($this->items);die;
  	}

  	public function add($item){
  		$this->pointer++;
  		$item->id = $this->pointer;

  		if(empty($this->first)){
  			$this->first=$item;
  			return;
  		}
 
 		$pointer = $this->first;

		while($pointer->next != null){
			$pointer = $pointer->next;
		}

  			$pointer->next = $item;
  	}

  	public function generateRandom(){
  		for($i = 0 ; $i<10; $i++){
  				$item = new Item();
  				$item->id=$i+1;
  				$item->content = 'Test '.$item->id;
  				$item->priority = rand(0,3);

  				if(rand(0,1))
  					$item->complete();
		  		$this->items[] = $item;
		  	}
  	}

	function __destruct() {
		$saved = json_encode($this->first);

      if(!file_put_contents($this->dataFile , $saved)){
      	echo ('<center>Dosyanız kaydedilemedi. "'.$this->dataFile.'" dosyasina yazma izni verin.</center>');
      }
	}
}
