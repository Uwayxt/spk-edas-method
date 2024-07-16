
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

## Kriteri Nilai Akademik

Jika calon mahasiswa berasal dari SMK, mata pelajaran yang tidak diajarkan di SMA, sistem tidak akan memasukkan kriteria tersebut dalam perhitungan nilai akademik untuk calon mahasiswa tersebut.

Untuk penilaian nilai akademik ada mata pelajaran sebagai penunjangnya:

### SMA (MIPA)
- MTK
- Fisika
- Bahasa Indonesia
- Bahasa Inggris
- TIK
- Seni Rupa

### SMA (IPS)

- Ekonomi
- Bahasa Indonesia
- Bahasa Inggris
- TIK
- Seni Rupa

### SMK

- MTK
- Bahasa Indonesia
- Bahasa Inggris
- Mata Pelajaran Jurusan (Dinamis) Maksimal 2

## Penentuan Penilaian di Setiap mata pelajaran

Untuk penilaian akademik nilai yang dimasukkan pengguna dalam rentang nilai 0 - 100 di setiap mata pelajaran berdasarkan jurusan sekolahnya


## Penentuan bobot di Setiap Jurusan

Terdapat dua jurusan yang akan dijadikan sebagai peminatan dalam pemilihan program studi, yaitu teknik informatika dan manajemen

### Teknik Informatika

- MIPA (Jurusan)
- MTK: 0.25
- Fisika: 0.15
- TIK: 0.25
- Ekonomi: 0.10
- Seni Rupa: 0.05
- Bahasa Indonesia: 0.10
- Bahasa Inggris: 0.10

### Manajemen

- IPS (Jurusan)
- MTK: 0.15
- Fisika: 0.05
- TIK: 0.15
- Ekonomi: 0.25
- Seni Rupa: 0.10
- Bahasa Indonesia: 0.15
- Bahasa Inggris: 0.15

## Referensi 

- (Aplikasi Pemilihan Fakultas di Universitas Klabat Bagi Calon Mahasiswa Menggunakan Metode DSS Fuzzy) [https://cogito.unklab.ac.id/index.php/cogito/article/view/109/78]
