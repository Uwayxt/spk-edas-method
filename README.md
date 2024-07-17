
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

- Nilai Akademik (0,4)
- Jurusan Sekolah (0,3)
- Akreditasi Program (0,2)
- Prospek Kerja (0,05)
- Fasilitas Penunjang (0,05)

## Pendalaman Kriteria



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
- Mata Pelajaran Jurusan (Dinamis) Maksimal 2


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

- Matematika: 0.3
- Fisika: 0.2
- Bahasa Inggris: 0.35
- Bahasa Indonesia: 0.15

### Manajemen

- Ekonomi: 0.3
- Matematika: 0.2
- Bahasa Indonesia: 0.35
- Bahasa Inggris: 0.15

ini berarti akan dilakukan perhitungan metode edas
note :
ketika pengguna memilih jurusan maka mata pelajaran yang akan di isi akan terfilter agar tidak diisi untuk mapel yang tidak ada

## Referensi
- (Aplikasi Pemilihan Fakultas di Universitas Klabat Bagi Calon Mahasiswa Menggunakan Metode DSS Fuzzy) [https://cogito.unklab.ac.id/index.php/cogito/article/view/109/78]
