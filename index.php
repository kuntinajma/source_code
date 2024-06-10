<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunti Najma Jalia|2022150182</title>

    <style>
        main {
            width: 100vw;
            min-height: 100vh;
            display: flex;
            flex-direction: row;
            align-items: start;
            justify-content: center;
        }

        section {
            padding: 10px;
        }

        .section1 {
            width: 25%;
        }
        .section2 {
            width: 75%;
        }

        .form-pinjam {
            display: flex;
            flex-direction: column;
            gap: 5px;
            justify-content: start;
            align-items: start;
        }

        table, th, td {
            border: solid 1px #000;
        }
    </style>
</head>
<body>
    <h1>Aplikasi Peminjaman Buku</h1>
    <h2>UTS - PBO - Kunti Najma Jalia</h2>

    <?php
        require_once './db.php';
        require_once './peminjaman.php';

        if(!isset($_SESSION['data_pinjam'])){
            $_SESSION['data_pinjam'] = array();
        }

        // fungsi proses simpan peminjaman
        function simpanPeminjaman($data){
            global $listMhs;
            global $listBook;
        
            $peminjaman = new Peminjaman($listMhs, $listBook);
            $peminjaman->pinjam($data['mahasiswa'], $data['buku'], $data['tanggal_pinjam']);
            array_push($_SESSION['data_pinjam'], serialize($peminjaman));
        }
         
        if(isset($_POST['pinjam'])){
            simpanPeminjaman($_POST);
        }
    ?>

    <main>
        <section class="section1">
            <h1>Input Data Pinjaman</h1>
            <hr>
            <form action="" method="post" class="form-pinjam">
                <label for="mahasiswa">Pilih Mahasiswa</label>
                <select name="mahasiswa" id="mahasiswa">
                    <option value="">-- Pilih Mahasiswa --</option>
                    <?php foreach ($listMhs as $mhs) {
                        echo "<option value=", $mhs->nimMahasiswa, ">", $mhs->namaMahasiswa, "</option>";
                    }
                    ?>
                </select>
                <label for="buku">Pilih Buku</label>
                <select name="buku" id="buku">
                    <option value="">-- Pilih Buku --</option>
                    <?php foreach ($listBook as $book) {
                        echo "<option value=", $book->kodeBuku, ">", $book->judulBuku, "</option>";
                    }
                    ?>
                </select>
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam">
                <br>
                <button type="submit" name="pinjam" value="pinjam">Pinjam Sekarang</button>
            </form>
        </section>
        <section class="section2">
            <h1>Data Peminjaman Buku</h1>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>NIM Mahasiswa</th>
                        <th>Nama Mahasiswa</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($_SESSION['data_pinjam'] as $peminjaman )
                    {
                        $p = unserialize($peminjaman);
                        echo "<tr>";
                        echo "<td>".$p->mahasiswa->nimMahasiswa."</td>";
                        echo "<td>".$p->mahasiswa->namaMahasiswa."</td>";
                        echo "<td>".$p->book->kodeBuku."</td>";
                        echo "<td>".$p->book->judulBuku."</td>";
                        echo "<td>".$p->tanggalPinjam."</td>";
                        echo "<td>".$p->tanggalKembali."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
