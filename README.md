Design pattern adalah sebuah solusi untuk mengatasi beberapa masalah yang terjadi di software desin

1. Creational pattern itu semua pattern yang berhubungan dengan bagaimana cara kita membuat
object atau menginisiasi sebuah object dari sebuah class
2. Structural Pattern adalah pattern yang memberikan solusi terhadap bagaimana cara memanagement sebuah structur object yang benar dan efisien
3. Behavioral pattern adalah memberikan solusi bagaimana cara kominikasi dari object satu ke object yang lain

#### Katalog
- Creational pattern
    1. Factory method \
        *Factory method adalah sebuah class atau sebuah method untuk membuat atau memproduksi sebuah object berdasarkan class yang berbeda beda.*
    2. Abstract method \
        *Abstract method berkeja sebagai super factory berfungsi untuk membuat factory lain.*
    3. Builder \
        *Builder adalah pola desain kreasional yang memungkinkan Anda membuat objek kompleks selangkah demi selangkah. Pola ini memungkinkan Anda menghasilkan jenis dan representasi objek yang berbeda menggunakan kode konstruksi yang sama.*
    4. Prototype \
        *Protorype adalah metode pattern yang bisa clone object yang sudah diinisiasi.*
    5. Singleton \
        *Singleton berfungsi untuk membatasi supaya object tidak di inisiasi lebih dari satu kali kegunaanya untuk menjadi global variable dan bisa menghemat penggunaan memory.*
- Structural pattern
    1. Adapter \
        *Adaptor adalah pola desain struktural yang memungkinkan objek dengan antarmuka yang tidak kompatibel untuk berkolaborasi.*
    2. Bridge \
        *Bridge adalah pola desain struktural yang memungkinkan Anda membagi kelas besar atau sekumpulan kelas yang terkait erat menjadi dua hierarki terpisah—abstraksi dan implementasi— yang dapat dikembangkan secara independen satu sama lain.*
    3. Composite \
        *Composite di pakai kalau membuat struktur tree seperti satu cabang punya cabang dan dari cabang anak itu punya cabang lagi dan seterusnya.*
    4. Decorator \
        *Decorator berfungsi menambahkan bebrapa fitur atau fungsionalitas dari fitur yang sudah ada.*
    5. Facade \
        *Facade berfungsi untuk membungkus logic yang komplek ke dalam satu class tersendiri atau file tersendiri yang mana nantinya class ini bisa di pakai class lain.*
    6. Flyweight \
        *Flyweight adalah pola desain struktural yang memungkinkan Anda memasukkan lebih banyak objek ke dalam jumlah RAM yang tersedia dengan berbagi bagian umum status di antara beberapa objek alih-alih menyimpan semua data di setiap objek.*
    7. Proxy \
        *Proxy yang berfungsi sebagai penengah atau penghubung antara konsumer dan class yang di konsumsi.*
- Behavioral pattern
    1. Chain of responsibility \
        *Chain of responsibility adalah sebuah pattern untuk melakukan chaining pada beberapa object biasa untuk memvalidasi data secara terpisah.*
    2. Command \
        *Command adalah sebuah pattern untuk mengelompokkan beberapa method atau method tunggal yang melakukan tugas yang spesifik dan lebih fokus pada satu tujuan.*
    3. Iterator \
        *Iterator adalah pola desain perilaku yang memungkinkan Anda melintasi elemen koleksi tanpa mengekspos representasi dasarnya (daftar, tumpukan, pohon, dll.).*
    4. Mediator \
        *Mediator adalah pola desain perilaku yang memungkinkan Anda mengurangi kekacauan ketergantungan antar objek. Pola tersebut membatasi komunikasi langsung antara objek dan memaksa mereka untuk berkolaborasi hanya melalui objek mediator.*
    5. Memento \
        *Memento adalah pola desain perilaku yang memungkinkan Anda menyimpan dan memulihkan keadaan objek sebelumnya tanpa mengungkapkan detail penerapannya.*
    6. Observer \
        *Observer memungkinkan sebuah object untuk me-notifikasi ke object lain saat ada perubahan state.*
    7. State \
        *State berfungsi untuk mengubah suatu perilaku obect berdasarkan state nya. Perilaku dari object ini juga mampu mengakses object lain yang telah dimasukkan di state utama.*
    8. Strategy \
        *Strategy berfungsi menentukan algoritma yang cocok untuk mengatasi sebuah problematika.*
    9. Template method \
        *Template method adalah pola desain perilaku yang mendefinisikan kerangka algoritme di superclass tetapi memungkinkan subclass menggantikan langkah spesifik algoritme tanpa mengubah strukturnya.*
    10. Visitor \
        *Visitor adalah pola desain perilaku yang memungkinkan Anda memisahkan algoritme dari objek tempatnya beroperasi.*

#### Sumber
- https://refactoring.guru
- https://www.youtube.com/watch?v=vFZ9njU3uGE&list=PLnQvfeVegcJbZAXLrFm7ncMrXBP6fcb0O&index=1
