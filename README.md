**Kuyruk Veri Modeli ile TO-DO Listesi**
----------------------------------------
Tarih: 14.05.2014  
Derleyici: PHP 5.5.9-1ubuntu4.7 

**Tanıtım**:  
Veri modeli olarak Kuyruk sistemini kullanıp, verilerin ilk gelenin ilk çıkması prensibi ile çalışan bir TO-DO listesi. Yazılım içerisinde mevcut iş, ilk sıradaki ve tamamlanmamış olandır.   

1. Bilgiler pointer aracılığı ile tutulmaktadır ve bir sonraki kayıda bu bilgi sayesinde geçiliyor.  
2. Açıklama kısımları ekledi, ilk satır başlık olarak algılanıp otomatik olarak büyütülüyor.  
3. Tamamlanan işlerde en son 3 tanesini en son tamamlanma süresine göre sıralıyor ve bunu 3 boyutlu bir dizi ile yapıyor, yer dolmuşsa en öndeki hariç diğerlerini kaydırıp, en son ekliyerek yapıyor.  
4. Açık olan işlerde aciliyete göre büyükten küçüğe doğru sıralamaktadır.  
İşler üzerinde Silme, ekleme, aciliyeti artırma/azaltma ve arama işlevleri vardır.  
Genel fonksiyonlar ve bulunduğu dosya isimleri aşağıdadır. 

**Karar Fonksiyonları:** 									main.php  
**Veri Sınıfı Tanımı  ve Fonksiyonları:	**			item.php  
**Veri Listesi Sınıfı Tanımı ve Fonksiyonları:** 	itemlist.php  

**Önemli Not:**  
Yazılım açılırken ve kapanırken “list.json” dosyası ile iletişime geçiyor. Yazma ve okuma yetkisi olması gerekmektedir. Açılışta okuyup, verileri işlemek için yüklerken, kullanıcıya ekran çıktısını göndermeden önce ise son halini ilgili dosyaya kaydetmektedir.  

