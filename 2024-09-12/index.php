<h2>Zodiak</h2>
<form action="" method="post">
    <input type="number" name="bulan" placeholder="Masukkan Bulan">
    <input type="number" name="tanggal" placeholder="Masukkan Tanggal">
    <input type="submit" value="Kirim" name="tombol">
</form>

<?php 
if (isset($_POST["tombol"])) {
    $bulan = $_POST["bulan"];
    $tanggal = $_POST["tanggal"];

    // echo $bulan;
    // echo $tanggal;

    $keterangan = "Salah";
    if ($bulan > 0 && $bulan < 13 && $tanggal > 0 && $tanggal < 32) {
        // $keterangan = "Benar";
        if ($bulan == 1) {
            if ($tanggal > 0 && $tanggal <20) {
                $keterangan = "capricorn";
            }
            if ($tanggal > 19 && $tanggal <32) {
                $keterangan = "aquarius";
            }
        }
        if ($bulan == 2) {
            if ($tanggal > 0 && $tanggal < 19) {
                $keterangan = "aquarius";
            }
            if ($tanggal > 18 && $tanggal < 30) {
                $keterangan = "pisces";
            }
        }
        if ($bulan == 3) {
            if ($tanggal > 0 && $tanggal < 21) {
                $keterangan = "pisces";
            }
            if ($tanggal > 20 && $tanggal < 32) {
                $keterangan = "aries";
            }
        }
        if ($bulan == 4) {
            if ($tanggal > 0 && $tanggal < 20) {
                $keterangan = "aries";
            }
            if ($tanggal > 19 && $tanggal < 32) {
                $keterangan = "taurus";
            }
        }
        if ($bulan == 5) {
            if ($tanggal > 0 && $tanggal < 21) {
                $keterangan = "taurus";
            }
            if ($tanggal > 20 && $tanggal < 32) {
                $keterangan = "gemini";
            }
        }
        if ($bulan == 6) {
            if ($tanggal > 0 && $tanggal < 21) {
                $keterangan = "gemini";
            }
            if ($tanggal > 20 && $tanggal < 32) {
                $keterangan = "cancer";
            }
        }
        if ($bulan == 7) {
            if ($tanggal > 0 && $tanggal < 23) {
                $keterangan = "cancer";
            }
            if ($tanggal > 22 && $tanggal < 32) {
                $keterangan = "leo";
            }
        }
        if ($bulan == 8) {
            if ($tanggal > 0 && $tanggal < 23) {
                $keterangan = "leo";
            }
            if ($tanggal > 22 && $tanggal < 32) {
                $keterangan = "virgo";
            }
        }
        if ($bulan == 9) {
            if ($tanggal > 0 && $tanggal < 23) {
                $keterangan = "virgo";
            }
            if ($tanggal > 22 && $tanggal < 32) {
                $keterangan = "libra";
            }
        }
        if ($bulan == 10) {
            if ($tanggal > 0 && $tanggal < 23) {
                $keterangan = "libra";
            }
            if ($tanggal > 22 && $tanggal < 32) {
                $keterangan = "scorpio";
            }
        }
        if ($bulan == 11) {
            if ($tanggal > 0 && $tanggal < 22) {
                $keterangan = "scorpio";
            }
            if ($tanggal > 21 && $tanggal < 32) {
                $keterangan = "sagitarius";
            }
        }
        if ($bulan == 12) {
            if ($tanggal > 0 && $tanggal < 22) {
                $keterangan = "sagitarius";
            }
            if ($tanggal > 21 && $tanggal < 32) {
                $keterangan = "capricorn";
            }
        }
    }
    echo $keterangan;
}
?>