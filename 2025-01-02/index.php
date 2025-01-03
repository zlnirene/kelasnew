<?php 

    function halo($nama, $kelas){
        echo "Halo, Selamat datang! $nama $kelas";
        echo "<br>";
    }
    halo("Zelina", "11 RPL");
    halo("Irene", "11 IPA 1");
    halo("Alesha", "12 IPS 3");
    halo("Vera", "12 IPA 5");
    halo("Maudy", "12 DKV");

    function plus ($a, $b){
        return $a + $b;
    }
    $result = plus(7, 3);
    echo $result;
    echo "<br>";

    function sapa ($nama = "Irene"){
        echo "Halo, $nama";
        echo "<br>";
    }
    sapa();
    sapa("Zelina");

    //function rekursif
    function faktorial($n){
        if ($n = 0 || $n = 1) {
            return 1;
        } else {
            return $n * faktorial($n - 1);
        }
    }
    echo faktorial(5);
    echo "<br>";

    //kalkulator

    function tambah($a, $b) {
        return $a + $b;
    }
    
    function kurang($a, $b) {
        return $a - $b;
    }
    
    function kali($a, $b) {
        return $a * $b;
    }
    
    function bagi($a, $b) {
        if ($b != 0) {
        return $a / $b;
        } else {
        return "Error: Pembagian dengan nol!";
        }
    }

?>
