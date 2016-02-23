<?php include 'itemlist.php'; 
  

$list = new ItemList();

if(!empty($_GET['action'])){
	header('Location: /');
	die;	 // yeni işlem gelmişse get metoduyla işlediğimiz için mükerreriyeti önlemek için redirect ediyoruz.
}

class completed{
    public $items;

    public function add($item){
      if(count($this->items)>2){
        for ($i=0; $i < count($this->items) - 1; $i++) { 
            $this->items[$i] = $this->items[$i + 1];
        }
        $this->items[$i] = $item;
      }else
       $this->items[] = $item;
    }
}

$searchList = null;
$completedList = new completed();
$activeList = null;
$current = null;
$searchId = -1;
$query = $_GET['query'];

$pointer = $list->first;
while (!empty($pointer)) {
		if(!empty($query) &&  preg_match('/'.$query.'/i',$pointer->content))
			$searchList[] = $pointer;
      
    if($pointer->complete_date == null){
      $activeList[$pointer->priority][] = $pointer;
      $pointer = $pointer->next;
      continue;
    }
    $completedList->add($pointer); 

    $pointer = $pointer->next;
}

 krsort($activeList);
?>
<?php if(!empty($searchList)){ ?>
<div class="panel panel-danger">
        <div class="panel-heading">Arama Sonuçları
         <a href="?" 
              	class="btn btn-success btn-sm pull-right" style="line-height: 1em;">
              Aramayı Temizle
              </a>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>İçerik</th>
                <th>Aciliyet</th>
                <th>Açılış Tarihi</th>
                <th>Kapanma Tarihi</th>
                <th>İşlem</th>
              </tr>
            </thead>
             <tbody><?php
              foreach ($searchList as $key => $item) {
                  echo $item->getHtml();
            }  ?>
             </tbody>
           </table>
        </div>
</div>
<?php } ?>

<div class="panel panel-default">
        <div class="panel-heading">Açık İşler
        <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#new" style="line-height: 1em;margin-left:1em">
          Yeni Ekle
        </button> 
         <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" 
            data-target="#search" style="line-height: 1em">
            Ara
          </button> 
      </div>
        <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>İçerik</th>
                <th>Aciliyet</th>
                <th>Açılış Tarihi</th>
                <th>Kapanma Tarihi</th>
                <th>İşlem</th>
              </tr>
            </thead>
             <tbody> <?php
            foreach ($activeList as $key => $list){ 
              foreach ($list as $key => $item) {
                  echo $item->getHtml();
              }
            } ?>
            </tbody>
          </table>
      </div>
</div>


<div class="panel panel-success">
        <div class="panel-heading">Tamamlananlar
      </div>
        <div class="panel-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>İçerik</th>
                 <th>Aciliyet</th>
                <th>Açılış Tarihi</th>
                <th>Kapanma Tarihi</th>
                <th>İşlem</th>
              </tr>
            </thead>
             <tbody> <?php
             $count = count($completedList->items);
            for ($i=$count-1; $i >= 0; $i--) {
                echo $completedList->items[$i]->getHtml();
             }   ?>
            </tbody>
          </table>
      </div>
</div>