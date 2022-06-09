# ujikompetensii

REPOSITORI UNTUK WEBSITE PORTAL AKADEMIK SEDERHANA

Hanya terdapat beberapa fitur yang dapat dilakukan oleh admin untuk mengelolah data pada sistem informasi akademik, seperti menampilkan data mahasiswa yang terdaftar pada akademik tersebut, menambahkan data mahasiswa baru yang mendaftar pada akademik, mengubah beberapa data yang sudah ada pada sistem informasi akademik tersebut.

Frontend / Tampilan           : HTML/ CSS
Backend / Bahasa Pemrograman  : PHP 8.1.6
Web Server                    : XAMPP V. 3.3.0
Text Editor                   : Visual Studio Code


User / Pengguna 
Hanya Admin, (pengguna dapat ditambahkan seperti mahasiswa/dosen next update🙏🏻🙏🏻🙏🏻)

Struktur Database 

nama database : harvard_university_db

tabel yang tersedia;

# mahsiswa_harvard

nim_mhs         |   int(16) primary key
nama_mhs        |   varchar(128)
mhs_ang         |   int(16)
progstud_mhs    |   varchar(128)
nik_mhs         |   varchar(255)
nohp_mhs        |   varchar(128)
tmptlhr_mhs     |   varchar(128)
tglhr_mhs       |   date
foto_mhs        |   varchar(128)
email_mhs       |   varchar(128)
alamat_mhs      |   varchar(128)


Halaman Akses

1. Admin              : - Login
                        - View Data
                        - Data Mahasiswa (membuat data, melihat detil data, memperbaharui data)
