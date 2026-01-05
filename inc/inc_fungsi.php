<?php

function ambil_gambar($id_tulisan) {
    global $koneksi;
    $query = "SELECT * FROM halaman WHERE id = '$id_tulisan'";
    $q1 = mysqli_query($koneksi, $query);
    $r1 = mysqli_fetch_array($q1);
    $text = $r1["isi"];

    preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);

    $gambar = $img[1];
    $gambar = str_replace('/img/..', '', $gambar);
    return $gambar;
}

function ambil_kutipan($id_tulisan){
    global $koneksi;
    $sql1   = "select * from halaman where id = '$id_tulisan'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = $r1['kutipan'];
    return $text;
}

function ambil_judul($id_tulisan){
    global $koneksi;
    $sql1   = "select * from halaman where id = '$id_tulisan'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = $r1['judul'];
    return $text;
}

function ambil_isi($id_tulisan){
    global $koneksi;
    $sql1   = "select * from halaman where id = '$id_tulisan'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = strip_tags($r1['isi']);
    return $text;
}

function bersihkan_judul($judul){
    $judul_baru     = strtolower($judul);
    $judul_baru     = preg_replace("/[^a-zA-Z0-9\s]/","",$judul_baru);
    $judul_baru     = str_replace(" ","-",$judul_baru);
    return $judul_baru;
}

function buat_link_halaman($id){
    global $koneksi;
    $sql1    = "select * from halaman where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $judul  = bersihkan_judul($r1['judul']);
    // http://localhost/e-ciremai/halaman.php/8/judul
    return "/register.php/$id/$judul";
}

function dapatkan_id(){
    $id     ="";
    if(isset($_SERVER['PATH_INFO'])){
        $id = dirname($_SERVER['PATH_INFO']);
        $id = preg_replace("/[^0-9]/","",$id);
    }
    return $id;
}