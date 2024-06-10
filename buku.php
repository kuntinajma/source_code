<?php

class Buku {
    public $kodeBuku;
    public $judulBuku;
    public $namaPenulis;
    public $tahunTerbit;


    public function __construct($kodeBuku, $judulBuku, $namaPenulis, $tahunTerbit){
        $this->kodeBuku = $kodeBuku;
        $this->judulBuku = $judulBuku;
        $this->namaPenulis = $namaPenulis;
        $this->tahunTerbit = $tahunTerbit;
    }
}