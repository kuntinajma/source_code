<?php
require_once './peminjaman.php';
require_once './mahasiswa.php';
require_once './buku.php';

$mhs1 = new Mahasiswa('2022150182', 'Kunti Najma Jalia', '96');
$mhs2 = new Mahasiswa('2020150012', 'Sifaul Hikmah');
$mhs3 = new Mahasiswa('2020150013', 'Syiva Cahyaningrum');
$mhs4 = new Mahasiswa('2020150014', 'Tyastiana');
$mhs5 = new Mahasiswa('2020150015', 'Meiyana Sri Wulandari');
$mhs6 = new Mahasiswa('2020150016', 'Rulan Indriana');
$mhs7 = new Mahasiswa('2020150017', 'Fitri Aulia Insani');

$listMhs = [$mhs1,$mhs2,$mhs3,$mhs4,$mhs5,$mhs6, $mhs7];

$book1 = new Buku('01', 'Bumi Manusia', 'Pramudya', 2000);
$book2 = new Buku('02', 'Amalan Ahlusunahwaljamaah', 'Ahmad Rochim', 2020);
$book3 = new Buku('03', 'Studi Pesantren', 'Zamakhsyari Dhofier', 2011);
$book4 = new Buku('04', 'Al-Quran dan Sains Modern', 'Misbahul Azhar', 2016);
$book5 = new Buku('05', 'Sukses Kuliah Luar Negri', 'Camelia Ranita', 2023);

$listBook = [$book1,$book2, $book3,$book4,$book5];
