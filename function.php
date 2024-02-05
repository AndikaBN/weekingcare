<?php
require 'dbconnct.php';

function tambahSiswa($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $jenisKelamin = htmlspecialchars($data["jenisKelamin"]);
    $umur = htmlspecialchars($data["umur"]);
    $tempatLahir = htmlspecialchars($data["tempatLahir"]);
    $tanggalLahir = htmlspecialchars($data["ttl"]);
    $asalSekolah = htmlspecialchars($data["asalSekolah"]);
    $wargaNegara = htmlspecialchars($data["wargaNegara"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tinggalBersama = htmlspecialchars($data["tinggalBersama"]);
    $namaAyah = htmlspecialchars($data["namaAyah"]);
    $pekerjaanAyah = htmlspecialchars($data["pekerjaanAyah"]);
    $namaIbu = htmlspecialchars($data["namaIbu"]);
    $pekerjaanIbu = htmlspecialchars($data["pekerjaanIbu"]);

    $fileAkte = uploadAkte();
    if (!$fileAkte) {
        return false;
    }

    $fileKK = uploadKK();
    if (!$fileKK) {
        return false;
    }

    $fileSKHU = uploadSKHU();
    if (!$fileSKHU) {
        return false;
    }

    $query = "INSERT INTO siswa 
    (nama, jenis_kelamin, umur, tempat_lahir, tanggal_lahir, asal_sekolah, kewarganegaraan, kelas, alamat, tinggal_bersama, nama_ayah, pekerjaan_ayah, 
    nama_ibu, pekerjaan_ibu, file_akte, file_kk, file_skhu) VALUES 
    ('$nama', '$jenisKelamin', '$umur', '$tempatLahir', '$tanggalLahir', '$asalSekolah', '$wargaNegara', 
    '$kelas', '$alamat', '$tinggalBersama', '$namaAyah', '$pekerjaanAyah', '$namaIbu', '$pekerjaanIbu',
    '$fileAkte', '$fileKK', '$fileSKHU')
    ";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadAkte()
{
    $namaFile = $_FILES["akte"]["name"];
    $ukuranFile = $_FILES["akte"]["size"];
    $error = $_FILES["akte"]["error"];
    $tmpName = $_FILES["akte"]["tmp_name"];

    // tidak ada file yang di upload
    if ($error === 4) {
        echo "
        <script>
            alert('mohon pilih file akte dengan benar');
        </script>
        ";
    }

    // cek apakah yg di upload adalah gambar or no
    $extensiGambarValid = ["jpg", "jpeg", "png"];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));
    if (!in_array($extensiGambar, $extensiGambarValid)) {
        echo "
        <script>
            alert('yang anda pilih bukan gambar');
        </script>
        ";
    }

    // cek ukuran file terlali besar atau tidak
    if ($ukuranFile > 20000000) {
        echo "
        <script>
            alert('ukuran gambar maksimal 2MB');
        </script>
        ";
    }

    // enkripsi
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;

    move_uploaded_file($tmpName, 'assets/img/siswa/akte/' . $namaFileBaru);

    return $namaFileBaru;
}

function uploadKK()
{
    $namaFile = $_FILES["filekk"]["name"];
    $ukuranFile = $_FILES["filekk"]["size"];
    $error = $_FILES["filekk"]["error"];
    $tmpName = $_FILES["filekk"]["tmp_name"];

    // tidak ada file yang di upload
    if ($error === 4) {
        echo "
        <script>
            alert('mohon pilih file akte dengan benar');
        </script>
        ";
    }

    // cek apakah yg di upload adalah gambar or no
    $extensiGambarValid = ["jpg", "jpeg", "png"];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));
    if (!in_array($extensiGambar, $extensiGambarValid)) {
        echo "
        <script>
            alert('yang anda pilih bukan gambar');
        </script>
        ";
    }

    // cek ukuran file terlali besar atau tidak
    if ($ukuranFile > 20000000) {
        echo "
        <script>
            alert('ukuran gambar maksimal 2MB');
        </script>
        ";
    }

    // enkripsi
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;

    move_uploaded_file($tmpName, 'assets/img/siswa/kk/' . $namaFileBaru);

    return $namaFileBaru;
}

function uploadSKHU()
{
    $namaFile = $_FILES["skhu"]["name"];
    $ukuranFile = $_FILES["skhu"]["size"];
    $error = $_FILES["skhu"]["error"];
    $tmpName = $_FILES["skhu"]["tmp_name"];

    // tidak ada file yang di upload
    if ($error === 4) {
        echo "
        <script>
            alert('mohon pilih file akte dengan benar');
        </script>
        ";
    }

    // cek apakah yg di upload adalah gambar or no
    $extensiGambarValid = ["jpg", "jpeg", "png"];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));
    if (!in_array($extensiGambar, $extensiGambarValid)) {
        echo "
        <script>
            alert('yang anda pilih bukan gambar');
        </script>
        ";
    }

    // cek ukuran file terlali besar atau tidak
    if ($ukuranFile > 20000000) {
        echo "
        <script>
            alert('ukuran gambar maksimal 2MB');
        </script>
        ";
    }

    // enkripsi
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;

    move_uploaded_file($tmpName, 'assets/img/siswa/skhu/' . $namaFileBaru);

    return $namaFileBaru;
}
?>