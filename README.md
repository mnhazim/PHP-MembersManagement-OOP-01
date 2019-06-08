1.	Detail Projek

1	Nama	MUHAMAD NOOR HAZIM BIN MOHAMED ESA
noorhazimesa@gmail.com

2	Tajuk Projek	Sistem Pengurusan Ahli




2.	Software / Hardware yang digunakan

Cakera Lembut / Software:
•	Sublime Text v3
•	XAMPP v3.2.2
o	Apache	: v2.4.28
o	PHP		: v7.1.0
o	phpMyAdmin	: v4.7.4
•	Library / Framework
o	HTML/CSS framework
	Bootstrap v4.2.1
•	Touch Browser

Cakera Keras / Hardware:
•	Laptop (LENOVO G400)
o	Rating		: 4.7 WXI
o	Processor	: Intel i3 gen3 2.40GHz
o	RAM		: 4GB
o	System Type	: 64bit
 










3.	Pangkalan Data / Database

Lakaran Entiti & Atribute
 Rajah 1.0 ( Lakaran Pangkalan Data)



Jenis Data / Size

Table : Pengurus
Pegurus_id	INT(11)	Primary Key
Pengurus_nama	VARCHAR(200)	
Pengurus_ic	VARCHAR(20)	
Pengurus_email	VARCHAR(100)	
Pengurus_pass	VARCHAR(100)	
Pengurus_tarikhdaftar	DATE	
Jadual 1 Pengurus
Table : Ahli
ahli_id	INT(11)	Primary Key
ahli_nama	VARCHAR(200)	
ahli_ic	VARCHAR(50)	
ahli_email	VARCHAR(100)	Unique
ahli_pass	VARCHAR(100)	
ahli_tarikhdaftar	DATE	
Jadual 2 Ahli

4.	Antaramuka / Interfaces 


 Rajah 2.0 (Paparan Log Masuk)

Penerangan Fungsi Rajah 2.0
•	Pengguna perlu memasukkan email dan juga kata laluan (admin@gmail.com & admin)
•	Link Daftar Baru adalah untuk pengguna register sebagai ahli baru




 
Rajah 3.0 (Paparan Pendaftaran Ahli)

Penerangan Fungsi Rajah 3.0
•	Pengguna perlu memasukkan butiran tersebut untuk daftar ahli
•	Antara html input attribute yang digunakan untuk tapisan/filter sebelum data diproses ialah:
o	Text field nama hanya huruf yang dibenarkan
o	IC hanya nombor sahaja yang dibenarkan
•	Tapisan/filter yang digunakan dalam koding proses ialah:
o	Email adalah unik dan tidak boleh sama dengan data yang sedia ada.














4.1 Ahli: 

 
Rajah 4.0 (Ahli: paparan utama ahli)

Penerangan Fungsi Rajah 4.0
•	Paparan utama menunjukkan detail ahli
•	Pengguna sebagai ahli hanya dibenarkan untuk mengemaskini profil




 
Rajah 4.1 (Ahli: paparan kemaskini Ahli)

Penerangan Fungsi Rajah 4.1
•	Paparan kemaskini ahli.
•	Antara html input attribute yang digunakan untuk tapisan/filter sebelum data diproses ialah:
o	Text field nama hanya huruf yang dibenarkan
o	IC hanya nombor sahaja yang dibenarkan
•	Tapisan/filter yang digunakan dalam koding proses ialah:
o	Email adalah unik dan tidak boleh sama dengan data yang sedia ada.




 
Rajah 4.2 (Ahli: paparan tukar kata laluan ahli)

Penerangan Fungsi Rajah 4.2
•	Paparan tukar kata laluan
•	Pengguna hanya perlu memasukkan kata laluan baru untuk menukar kata laluan.





























4.2 Admin/Pengurus :

 
Rajah 5.0 (Admin: paparan utama admin)

Penerangan Fungsi Rajah 5.0
•	Paparan utama Pengurus/Admin.
•	Antara fungsi Pengurus/Admin yang dibenarkan dalam sistem ini adalah untuk menambah, mengemaskini dan menghapus data ahli.
•	Method yang digunakan untuk hapus data ahli adalah POST Method





 
Rajah 5.1 (Admin: paparan tambah ahli)

Penerangan Fungsi Rajah 5.1
•	Pengurus  perlu memasukkan butiran ahli untuk daftar ahli
•	Antara html input attribute yang digunakan untuk tapisan/filter sebelum data diproses ialah:
o	Text field nama hanya huruf yang dibenarkan
o	IC hanya nombor sahaja yang dibenarkan
•	Tapisan/filter yang digunakan dalam koding proses ialah:
o	Email adalah unik dan tidak boleh sama dengan data yang sedia ada.
•	Pengurus tidak boleh memasukkan kata laluan ahli, kata laluan ahli akan disetkan melalui ic ahli. Ahli perlu log masuk ke dalam sistem dan membuat penukaran kata laluan.

 
Rajah 5.2 (Admin: paparan lihat detail ahli)

Penerangan Fungsi Rajah 5.2
•	Fungsi butang/button lihat adalah untuk melihat detail ahli
 


 
Rajah 5.3 (Admin: paparan kemaskini ahli)

Penerangan Fungsi Rajah 5.3
•	Paparan kemaskini ahli.
•	Antara html input attribute yang digunakan untuk tapisan/filter sebelum data diproses ialah:
o	Text field nama hanya huruf yang dibenarkan
o	IC hanya nombor sahaja yang dibenarkan
•	Tapisan/filter yang digunakan dalam koding proses ialah:
o	Email adalah unik dan tidak boleh sama dengan data yang sedia ada.
•	Reset Password akan disetkan semula password ahli dengan ic ahli.

 
Rajah 5.4 (Admin: hapus data)

Penerangan Fungsi Rajah 5.4
•	Apabila butang/button hapus ditekan, paparan alert akan memastikan sama ada keputusan menghapus data adalah betul atau tidak. 



4.3 Client Error

 
Rajah 6.0 (404 Client Error)


 
Rajah 6.1 (404 Client Error)

Penerangan Fungsi Rajah 6.0 & Rajah 6.1
•	Paparan 404 url not found / Client Error akan dipaparkan apabila permintaan/request url tidak dijumpai.


5.	Kaedah / Keselamatan koding :
a.	Kaedah Koding
•	Menggunakan core PHP koding
•	Menggunakan konsep Object Oriented Programming (OOP) dalam pengkodan PHP.
•	Menggunakan kaedah control untuk mengawal proses PHP seperti Create,Read,Update,Delete(CRUD)
•	Menggunakan HTML/CSS framework iaitu bootstrap 4.2.1 untuk antaramuka.
•	Menggunakan include file untuk memastikan koding tidak terlalu panjang dalam satu-satu fail.
b.	Keselamatan / Security
•	Menggunakan SESSION untuk memastikan segala tindakan/actions yang dilakukan oleh pengguna adalah daripada pengguna yang sah(berdaftar).
•	Menggunakan kaedah salting(AES Encryption) pada setiap password yang akan disimpan di pangkalan data/database
•	Email pengguna adalah unik supaya mengelakkan daripada salinan/duplicate data.
•	Menggunakan function mysqli_escape_string pada setiap data yang dimasukkan daripada pengguna sebelum data disimpan dalam pangkalan data/database untuk mengelakkan daripada SQL Injection.
