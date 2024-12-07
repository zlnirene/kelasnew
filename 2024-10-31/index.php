<?php 

    $identitas = ["nama" => "Zelina Irene Chrisani", 
                "alamat" => "Griya Permata Gedangan",
                "telepon" => "082131786655",
                "email" => "zelinairene899@gmail.com",
                "instagram" => "zlnairene",
                "twitter" => "shanniren"];

    $sekolah = ["TK" => "RA Al-Fath",
                "SD" => "SD Negeri Keboansikep 1",
                "SMP" => "SMP Negeri 1 Gedangan",
                "SMK" => "SMK Negeri 2 Buduran", 
                "S1" => "ITS",
                "S2" => "NTU",
                "S3" => "MIT"];

    $hobi = ["Membaca", "Berenang", "Menonton Film", "Menggambar", "Membuat cerita fiksi"];

    $skill = ["C++" => "Expert",
            "HTML" => "Newbie",
            "CSS" => "Intermediate",
            "PHP" => "Newbie"];

    $deskripsi = "Saya adalah seorang programmer pemula, giat bekerja dan rajin belajar agar saya kaya raya. <br> Dengan time management yang tepat, saya dapat membagi waktu antara kegiatan prioritas dan me time terutama saat weekend. <br> Membaca cerita fiksi dan menulis jurnal saya lakukan rutin setiap hari untuk relaxing serta mengevaluasi diri. <br> Sebagai siswi sekolah menengah yang sebentar lagi lulus, saya mempersiapkan diri untuk mempelajari materi ujian seleksi perguruan tinggi. <br> Fyi, saya seorang nctzen, a.k.a. pacar haechan (backstreet kita)";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Riwayat Hidup</title>
    <style>
        h1, h2, table, p {
            text-align: center;
        }

        table {
            width: 800px;
        }

        .container {
            width: 800px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>DAFTAR RIWAYAT HIDUP</h1>
        <h2>Data Diri</h2>
        <table border="1px">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($identitas as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <hr>
        <h2>Riwayat Pendidikan</h2>
        <table border="1px">
            <thead>
                <tr>
                    <th>Pendidikan</th>
                    <th>Nama Sekolah</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($sekolah as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <hr>
        <h2>Skill Coding</h2>
        <table border="1px">
            <thead>
                <tr>
                    <th>Skill</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($skill as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <hr>
        <h2>Hobi</h2>
        <ul>
            <?php 
                foreach ($hobi as $key) {
                    ?>
                        <li><?= $key ?></li>
                    <?php
                }
            ?>
        </ul>
        <hr>
        <h2>Tentang Aku</h2>
        <p><?= $deskripsi ?></p>
    </div>
</body>
</html>