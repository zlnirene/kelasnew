<?php 
    for ($i=1; $i <= 10; $i++) { 
        echo $i;
    }
    echo "<br>";

    for ($i=10; $i >= 0; $i--) { 
        echo $i;
    }
    echo "<br>";

    $ganjil = 7%2; //modulus (ditampilkan sisa pembagian)
    echo $ganjil;

    echo "<br>";

    for ($i=1; $i < 100; $i++) { 
        $ganjil = $i % 2;
        //echo $ganjil;
        if ($ganjil == 0) {
            echo $i;
        }
        // if $ganjil jika menggunakan 1 maka keluar ganjil
        // if $ganjil jika menggunakan 0 maka keluar genap
    }
    echo "<br>";

    $kkm = 80;
    $nilai = 75;
    if ($nilai > $kkm) {
        echo "lulus";
    } else {
        echo "tidak lulus";
    }

    echo "<br>";

    $status = "tidak lulus";
    if ($nilai > $kkm) {
        $status = "lulus";
    }
    echo $status;
    echo "<br>";

    $raport = 0;
    $tugas = 1;
    if ($tugas == 1) {
        $raport = 80;
    }
    echo $raport;

    echo "<br>";

    $bulan = 8;
    $tanggal = 29;
    $keterangan = "salah";
    if ($bulan > 0 && $bulan < 13) {
        // $keterangan = "benar";
        //zodiak
        if ($tanggal > 0 && $tanggal < 32) {
            $keterangan = "benar";
            if ($bulan == 1 && $tanggal > 0 && $tanggal < 20) {
                $keterangan = "capricorn";
            }
            if ($bulan == 1 && $tanggal > 19 && $tanggal < 32) {
                $keterangan = "aquarius";
            }
            if ($bulan == 2 && $tanggal > 0 && $tanggal < 19) {
                $keterangan = "aquarius";
            }
            if ($bulan == 2 && $tanggal > 18 && $tanggal < 30) {
                $keterangan = "pisces";
            }
            if ($bulan == 3 && $tanggal > 0 && $tanggal < 21) {
                $keterangan = "pisces";
            }
            if ($bulan == 3 && $tanggal > 20 && $tanggal < 32) {
                $keterangan = "aries";
            }
            if ($bulan == 4 && $tanggal > 0 && $tanggal < 20) {
                $keterangan = "aries";
            }
            if ($bulan == 4 && $tanggal > 19 && $tanggal < 32) {
                $keterangan = "taurus";
            }
            if ($bulan == 5 && $tanggal > 0 && $tanggal < 21) {
                $keterangan = "taurus";
            }
            if ($bulan == 5 && $tanggal > 20 && $tanggal < 32) {
                $keterangan = "gemini";
            }
            if ($bulan == 6 && $tanggal > 0 && $tanggal < 21) {
                $keterangan = "gemini";
            }
            if ($bulan == 6 && $tanggal > 20 && $tanggal < 32) {
                $keterangan = "cancer";
            }
            if ($bulan == 7 && $tanggal > 0 && $tanggal < 23) {
                $keterangan = "cancer";
            }
            if ($bulan == 7 && $tanggal > 22 && $tanggal < 32) {
                $keterangan = "leo";
            }
            if ($bulan == 8 && $tanggal > 0 && $tanggal < 23) {
                $keterangan = "leo";
            }
            if ($bulan == 8 && $tanggal > 22 && $tanggal < 32) {
                $keterangan = "virgo";
            }
            if ($bulan == 9 && $tanggal > 0 && $tanggal < 23) {
                $keterangan = "virgo";
            }
            if ($bulan == 9 && $tanggal > 22 && $tanggal < 32) {
                $keterangan = "libra";
            }
            if ($bulan == 10 && $tanggal > 0 && $tanggal < 23) {
                $keterangan = "libra";
            }
            if ($bulan == 10 && $tanggal > 22 && $tanggal < 32) {
                $keterangan = "scorpio";
            }
            if ($bulan == 11 && $tanggal > 0 && $tanggal < 22) {
                $keterangan = "scorpio";
            }
            if ($bulan == 11 && $tanggal > 21 && $tanggal < 32) {
                $keterangan = "sagitarius";
            }
            if ($bulan == 12 && $tanggal > 0 && $tanggal < 22) {
                $keterangan = "sagitarius";
            }
            if ($bulan == 12 && $tanggal > 21 && $tanggal < 32) {
                $keterangan = "capricorn";
            }
        }
    }
    echo $keterangan;

?>