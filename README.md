
## Sistem Pengambil Keputusan

Sistem pengambil keputusan yang akan dikembangkan difokuskan pada membantu calon mahasiswa dalam memilih program studi yang tepat, khususnya dalam program studi Teknik Informatika dan Manajemen. Sistem ini akan mengintegrasikan berbagai kriteria evaluasi, seperti nilai akademik, latar belakang pendidikan, prospek karir, fasilitas penunjang.

Pengguna akan diminta untuk memasukkan informasi seperti nilai-nilai akademik mereka, latar belakang pendidikan sebelumnya. Sistem akan menggunakan menggunakan salah satu pengambil keputusan yaitu metode perceptron untuk menganalisis data yang dimasukkan dan memberikan rekomendasi berdasarkan bobot yang telah ditetapkan untuk setiap kriteria.

## Penentuan Kriteria

Di awal tentukan Kriteria sebagai perbandingan di tahap selanjutnya

- Nilai Akademik 
- Jurusan Sekolah
- Akreditasi Program 
- Prospek Kerja
- Fasilitas Penunjang

## Penentuan Bobot Setiap Kriteria

Sebagai pemilihan program studi adapun bobotnya untuk menentukan program studi mana yang cocok

Bobot Teknik Informatika
- Mata Pelajaran Dinamis (sesuai jurusan): 0.25 (25%) / Fisika
- Mata Pelajaran Matematika: 0.2 (20%)
- Mata Pelajaran Bahasa Indonesia: 0.15 (15%)
- Mata Pelajaran Bahasa Inggris: 0.15 (15%)
- Jurusan Sekolah: 0.1 (10%)
- Akreditasi Program: 0.05 (5%)
- Prospek Kerja: 0.05 (5%)
- Fasilitas Penunjang: 0.05 (5%)

Bobot Manajemen
- Mata Pelajaran Dinamis (sesuai jurusan): 0.25 (25%) / Ekonomi
- Mata Pelajaran Matematika: 0.2 (20%)
- Mata Pelajaran Bahasa Indonesia: 0.15 (15%)
- Mata Pelajaran Bahasa Inggris: 0.15 (15%)
- Jurusan Sekolah: 0.1 (10%)
- Akreditasi Program: 0.05 (5%)
- Prospek Kerja: 0.05 (5%)
- Fasilitas Penunjang: 0.05 (5%)

note : ketika kriteria yang dipilih teknik informatika maka mata pelajaran yang tidak berelasi dengan manajemen akan menjadi tipe cost

## Kriteria Nilai Akademik

Jika calon mahasiswa berasal dari SMK, mata pelajaran yang tidak diajarkan di SMA, sistem tidak akan memasukkan kriteria tersebut dalam perhitungan nilai akademik untuk calon mahasiswa tersebut.

Untuk penilaian nilai akademik ada mata pelajaran sebagai penunjangnya:

### SMA (MIPA)

- Fisika
- Matematika
- Bahasa Indonesia
- Bahasa Inggris

### SMA (IPS)

- Ekonomi
- Matematika
- Bahasa Indonesia
- Bahasa Inggris

### SMK (RPL,TKJ,DKV,Akuntansi,OTKP)

- Matematika
- Bahasa Indonesia
- Bahasa Inggris
- Mata Pelajaran Jurusan (Dinamis) 1

## Penentuan Penilaian di Setiap mata pelajaran

Untuk penilaian akademik nilai yang dimasukkan pengguna dalam rentang nilai 0 - 100 di setiap mata pelajaran berdasarkan jurusan sekolahnya

- 85 - 100 = 4
- 70 - 80 = 3
- 55 - 60 = 2
- 30 - 50 = 1

## Penentuan Penilaian di Jurusan Sekolah

Terdapat nilai yang berbeda terhadap jurusan sekolah ketika jurusan sekolah tersebut berhubungan dengan jurusan di kuliah

### Teknik Informatika
- RPL (4)
- TKJ (3)
- MIPA (3)
- DKV (2)

### Manajemen

- Otomatisasi dan Tata Kelola Perkantoran (4)
- Akuntansi (3)
- Bisnis Daring dan Pemasaran (3)
- IPS (2)

## Penentuan Bobot di Setiap Jurusan

Terdapat dua jurusan yang akan dijadikan sebagai peminatan dalam pemilihan program studi, yaitu teknik informatika dan manajemen

### Teknik Informatika

- 1 mata kuliah jurusan (RPL, TKJ, DKV): 1
- Matematika: 0.2
- Fisika: 0.2
- Bahasa Inggris: 0.35
- Bahasa Indonesia: 0.15

### Manajemen

- 1 mata kuliah jurusan (AK,BDPM,OTKP)
- Ekonomi: 0.3
- Matematika: 0.2
- Bahasa Indonesia: 0.35
- Bahasa Inggris: 0.15

ini berarti akan dilakukan perhitungan metode edas
note :
ketika pengguna memilih jurusan maka mata pelajaran yang akan di isi akan terfilter agar tidak diisi untuk mapel yang tidak ada

## Set Up Laravel
Instal Laravel beserta lainnya
```php
composer install
```

```php
php artisan key:generate
```

```php
php artisan migrate
```

## Set Up Data Kriteria
Silahkan jalankan perintah berikut secara berurutan
Seeder Admin
```php
php artisan db:seed --class=AdminSeeder
```

Seeder Kaprodi
```php
php artisan db:seed --class=KaprodiSeeder
```

Seeder Criteria
```php
php artisan db:seed --class=CriteriaSeeder
```
Seeder Major
```php
php artisan db:seed --class=MajorSeeder
```

Seeder Bobot dan Nilai Kriteria Untuk Kriteria Selain Mapel
```php
php artisan db:seed --class=ValueCriteriaSeeder
```
Seeder Untuk menghubungkan berbagai Kriteria dengan Jurusan
ada yang untuk semua jurusan ada yang hanya untuk jurusan tertentu
```php
php artisan db:seed --class=CriteriaMajorSeeder
```


## Referensi
- (Aplikasi Pemilihan Fakultas di Universitas Klabat Bagi Calon Mahasiswa Menggunakan Metode DSS Fuzzy) [https://cogito.unklab.ac.id/index.php/cogito/article/view/109/78]
- (Evaluation based on Distance from Average Solution (EDAS)) [https://extra.cahyadsn.com/edas]
