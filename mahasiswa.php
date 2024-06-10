<?php

class Mahasiswa {
    public $nimMahasiswa;
    public $namaMahasiswa;
    public $nilaiMahasiswa;

    public function __construct($nimMahasiswa, $namaMahasiswa, $nilaiMahasiswa=null){
        $this->nimMahasiswa = $nimMahasiswa;
        $this->namaMahasiswa = $namaMahasiswa;
        $this->nilaiMahasiswa = $nilaiMahasiswa;
    }
}