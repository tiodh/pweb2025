# Tugas Pemrograman Website 2025

## Pembagian Tugas
| No | Nama Tabel                          | Dikerjakan Oleh                           |
| -- | ----------------------------------- | ----------------------------------------- |
| 1  | users                               | — (default Laravel)                       |
| 2  | universitas                         | **Tio Dharmawan**                         |
| 3  | fakultas                            | **MICHAEL MUHAMMAD YUDANANTA**            |
| 4  | jurusan                             | **HASY ARVIN AHMAD**                      |
| 5  | prodi                               | **MOCHAMMAD RYAN ALVIANSYAH**             |
| 6  | dosen                               | **REGINA DIVA OLINDIA PUTRI**             |
| 7  | mahasiswa                           | **DAFFA GASTIA PRABASWARA**               |
| 8  | mata_kuliah                         | **ADAM RIZQI FIRDAUSI**                   |
| 9  | kelas                               | **ACHMAD NUHAN T**                        |
| 10 | dosen_pengampu                      | **MUHAMAD ROHMAD HIDAYAT**                |
| 11 | gedung                              | **ADIRA FATIH ROMADHAN**                  |
| 12 | ruangan                             | **PRADITYA SAVILLA YOVIEANDRA**           |
| 13 | jadwal                              | **KAYSA RAFA ADITYA PUTRA NEGARA**        |
| 14 | registrasi                          | **MUHAMMAD SALMAN GHIFFARY HIDAYATULLAH** |
| 15 | krs                                 | **AHMAD ADAM SAIFUL MILA**                |
| 16 | nilai                               | **GUNAWAN WICAKSONO**                     |
| 17 | tahun_ajaran                        | **YURI WICAKSONO**                        |
| 18 | semester                            | **ARUL PRAMANA BAHARI**                   |
| 19 | beasiswa                            | **ACHMAD FAIEZ JATMIKO**                  |
| 20 | penerima_beasiswa                   | **MOHAMMAD ALFIN KAMAL SAPUTRA**          |
| 21 | biaya_kuliah                        | **AHMAD ZAFARELL ZOUVAN DHANI**           |
| 22 | pembayaran                          | **RADITYA FAHRIZAL DIANDRA**              |
| 23 | pengumuman                          | **ADITIYA RIFKY ARYA PUTRA**              |
| 24 | akun_dosen                          | **ATHA RIFYAN ADYFY**                     |
| 25 | akun_mahasiswa                      | **MUHAMMAD FAJRUL FALAH**                 |
| 26 | bimbingan_akademik                  | **NASRULLOH TRI RAMADHANI**               |
| 27 | skripsi                             | **MOHAMAD ARYA FAHREZA HIDAYAD**          |
| 28 | pembimbing_skripsi                  | **MUHAMAD RIZQI RAMADHANI**               |
| 29 | sidang_skripsi                      | **MUHAMMAD RAIHAN RAMDHANI**              |
| 30 | penguji_skripsi                     | **SYADID CHOIRI**                         |
| 31 | alumni                              | **MUHAMMAD NIZAR WICAKSONO**              |
| 32 | perusahaan                          | **AGUNG KURNIAWAN**                       |
| 33 | lowongan_kerja                      | **MOCHAMMAD REIKHAN ZAKY**                |
| 34 | lamaran_pekerjaan                   | **CHRISTIAN EVAN RAHARJO**                |
| 35 | organisasi_mahasiswa                | **DARREL FAWWAZ AGATHON**                 |
| 36 | anggota_organisasi                  | **AIRELL FITRAHAVILA**                    |
| 37 | prestasi                            | **ERGA PRATAMA**                          |
| 38 | pelatihan                           | **KHOSYATULLAH AHMAD**                    |
| 39 | peserta_pelatihan                   | **YURISSANDY AL AHAM PRATAMA**            |
| 40 | log_aktivitas                       | **ADJASTYA BUDI ADJIE SYAHPUTRA**         |
| 41 | riwayat_perubahan_data              | **M. AGIL ASSHOFI**                       |

# ERD SIMPT

## 1. users
- id (PK)
- name
- email
- password
- role (admin/dosen/mahasiswa)
- created_at
- updated_at

## 2. universitas
- id (PK)
- nama
- alamat
- telepon
- email
- created_at
- updated_at

## 3. fakultas
- id (PK)
- universitas_id (FK → universitas.id)
- nama
- dekan
- kode_fakultas
- created_at
- updated_at

## 4. jurusan
- id (PK)
- fakultas_id (FK → fakultas.id)
- nama
- kode_jurusan
- ketua_jurusan
- created_at
- updated_at

## 5. prodi
- id (PK)
- jurusan_id (FK → jurusan.id)
- nama
- jenjang
- akreditasi
- created_at
- updated_at

## 6. dosen
- id (PK)
- nip
- nama
- email
- prodi_id (FK → prodi.id)
- created_at
- updated_at

## 7. mahasiswa
- id (PK)
- nim
- nama
- angkatan
- prodi_id (FK → prodi.id)
- created_at
- updated_at

## 8. mata_kuliah
- id (PK)
- kode_mk
- nama
- sks
- prodi_id (FK → prodi.id)
- created_at
- updated_at

## 9. kelas
- id (PK)
- mata_kuliah_id (FK → mata_kuliah.id)
- nama_kelas
- semester
- tahun_ajaran
- created_at
- updated_at

## 10. dosen_pengampu
- id (PK)
- dosen_id (FK → dosen.id)
- kelas_id (FK → kelas.id)
- status_pengampu
- keterangan
- created_at
- updated_at

## 11. gedung
- id (PK)
- nama
- lokasi
- jumlah_lantai
- kode_gedung
- created_at
- updated_at

## 12. ruangan
- id (PK)
- gedung_id (FK → gedung.id)
- kode_ruangan
- kapasitas
- jenis_ruangan
- created_at
- updated_at

## 13. jadwal
- id (PK)
- kelas_id (FK → kelas.id)
- ruangan_id (FK → ruangan.id)
- hari
- jam_mulai
- jam_selesai
- created_at
- updated_at

## 14. registrasi
- id (PK)
- mahasiswa_id (FK → mahasiswa.id)
- semester
- tahun_ajaran
- status
- created_at
- updated_at

## 15. krs
- id (PK)
- registrasi_id (FK → registrasi.id)
- kelas_id (FK → kelas.id)
- tanggal_pengisian
- status_validasi
- created_at
- updated_at

## 16. nilai
- id (PK)
- krs_id (FK → krs.id)
- nilai_angka
- nilai_huruf
- tanggal_input
- created_at
- updated_at

## 17. tahun_ajaran
- id (PK)
- tahun_mulai
- tahun_selesai
- status_aktif
- keterangan
- created_at
- updated_at

## 18. semester
- id (PK)
- nama
- tahun_ajaran_id (FK → tahun_ajaran.id)
- status
- urutan
- created_at
- updated_at

## 19. beasiswa
- id (PK)
- nama
- penyelenggara
- jenis
- periode
- created_at
- updated_at

## 20. penerima_beasiswa
- id (PK)
- mahasiswa_id (FK → mahasiswa.id)
- beasiswa_id (FK → beasiswa.id)
- tahun
- status
- created_at
- updated_at

## 21. biaya_kuliah
- id (PK)
- prodi_id (FK → prodi.id)
- semester
- jumlah
- jenis_pembayaran
- created_at
- updated_at

## 22. pembayaran
- id (PK)
- mahasiswa_id (FK → mahasiswa.id)
- biaya_kuliah_id (FK → biaya_kuliah.id)
- tanggal_bayar
- jumlah
- created_at
- updated_at

## 23. pengumuman
- id (PK)
- judul
- isi
- tanggal
- user_id (FK → users.id)
- created_at
- updated_at

## 24. akun_dosen
- id (PK)
- user_id (FK → users.id)
- dosen_id (FK → dosen.id)
- status
- terakhir_login
- created_at
- updated_at

## 25. akun_mahasiswa
- id (PK)
- user_id (FK → users.id)
- mahasiswa_id (FK → mahasiswa.id)
- status
- terakhir_login
- created_at
- updated_at

## 26. bimbingan_akademik
- id (PK)
- mahasiswa_id (FK → mahasiswa.id)
- dosen_id (FK → dosen.id)
- tanggal
- catatan
- created_at
- updated_at

## 27. skripsi
- id (PK)
- mahasiswa_id (FK → mahasiswa.id)
- judul
- status
- tanggal_pengajuan
- created_at
- updated_at

## 28. pembimbing_skripsi
- id (PK)
- skripsi_id (FK → skripsi.id)
- dosen_id (FK → dosen.id)
- peran
- status_persetujuan
- created_at
- updated_at

## 29. sidang_skripsi
- id (PK)
- skripsi_id (FK → skripsi.id)
- tanggal_sidang
- ruangan_id (FK → ruangan.id)
- status_sidang
- created_at
- updated_at

## 30. penguji_skripsi
- id (PK)
- sidang_skripsi_id (FK → sidang_skripsi.id)
- dosen_id (FK → dosen.id)
- nilai
- catatan
- created_at
- updated_at

## 31. alumni
- id (PK)
- mahasiswa_id (FK → mahasiswa.id)
- tahun_lulus
- pekerjaan
- instansi
- created_at
- updated_at

## 32. perusahaan
- id (PK)
- nama
- alamat
- kontak
- email
- created_at
- updated_at

## 33. lowongan_kerja
- id (PK)
- perusahaan_id (FK → perusahaan.id)
- judul
- deskripsi
- tanggal_tutup
- created_at
- updated_at

## 34. lamaran_pekerjaan
- id (PK)
- alumni_id (FK → alumni.id)
- lowongan_kerja_id (FK → lowongan_kerja.id)
- tanggal_lamaran
- status
- created_at
- updated_at

## 35. organisasi_mahasiswa
- id (PK)
- nama
- jenis
- tahun_berdiri
- pembina_id (FK → dosen.id)
- created_at
- updated_at

## 36. anggota_organisasi
- id (PK)
- organisasi_id (FK → organisasi_mahasiswa.id)
- mahasiswa_id (FK → mahasiswa.id)
- jabatan
- periode
- created_at
- updated_at

## 37. prestasi
- id (PK)
- mahasiswa_id (FK → mahasiswa.id)
- nama_prestasi
- tingkat
- tahun
- created_at
- updated_at

## 38. pelatihan
- id (PK)
- nama
- penyelenggara
- tanggal_mulai
- tanggal_selesai
- created_at
- updated_at

## 39. peserta_pelatihan
- id (PK)
- mahasiswa_id (FK → mahasiswa.id)
- pelatihan_id (FK → pelatihan.id)
- status_kehadiran
- sertifikat
- created_at
- updated_at

## 40. log_aktivitas
- id (PK)
- user_id (FK → users.id)
- aksi
- ip_address
- waktu
- created_at
- updated_at

## 41. riwayat_perubahan_data
- id (PK)
- user_id (FK → users.id)
- tabel_terpengaruh
- aksi (insert/update/delete)
- waktu_perubahan
- created_at
- updated_at
