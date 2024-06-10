<?php
require_once './buku.php';
require_once './mahasiswa.php';
require_once './db.php';

class Peminjaman {
    private $listMhs;
    private $listBook;

    public $mahasiswa;
    public $book;
    public $tanggalPinjam;
    public $tanggalKembali;
    public function __construct(array $listMhs, array $listBook) {
        $this->listMhs = $listMhs;
        $this->listBook = $listBook;

    }

    public function pinjam(string $nimMhs, string $kodeBuku, string $tglPinjam){
        $bookFound = $this->searchBook($kodeBuku);
        $mhsFound = $this->searchMhs($nimMhs);

        $this->book = $bookFound;
        $this->mahasiswa = $mhsFound;
        $this->tanggalPinjam = $tglPinjam;

        $tgl_pinjam = new DateTime($tglPinjam);
        $tgl_pinjam->modify("+ 5 days");
        
        $this->tanggalKembali =  $tgl_pinjam->format('Y-m-d');
    }

    private function searchBook($kodeBuku){
        foreach($this->listBook as $book){
            if($book->kodeBuku == $kodeBuku){
                return $book;
            }
        }
    }

    private function searchMhs($nimMhs){
        foreach($this->listMhs as $mhs){
            if($mhs->nimMahasiswa == $nimMhs){
                return $mhs;
            }
        }
    }
}
