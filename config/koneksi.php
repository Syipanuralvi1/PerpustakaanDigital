<?php
class Koneksi
{
    public function koneksi(){
        $kon = mysqli_connect('localhost','root','','perpustakaan_digital');
        return $kon;
    }
}