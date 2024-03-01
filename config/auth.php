<?php
session_start();
require('config/koneksi.php');
$cek = new Koneksi;
class Auth{

    public function register($data){

        $cek = new Koneksi;
        $Username = $data['Username'];
        $Password = Password_hash($data['Password'], PASSWORD_BCRYPT);
        $Email = $data['Email'];
        $NamaLengkap = $data['NamaLengkap'];
        $Alamat = $data['Alamat'];
         $sql = "INSERT INTO user VALUES (Null,'$Username', '$Password','$Email','$NamaLengkap','$Alamat','user')";
         $query = mysqli_query($cek->koneksi(), $sql);
         var_dump($sql);
 
         if ($query) {
             echo "<script>alert('Data Berhasil Ditambahkan');window.location='index.php?page=login'</script>";
      } else {
             echo "data gagal ditambahkan";
      }
 }
    public function login($email, $password){
        $cek = new Koneksi;
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $query = mysqli_query($cek->koneksi(), $sql);
        $data = mysqli_fetch_assoc($query);
        $datapassword = isset($data['Password']) ? $data['Password'] : "";
    if(password_verify($password, $datapassword)){

        if($data['Role'] == 'admin'){
            $_SESSION['data'] = $data;
            header('location: dashboard.php?page=user');

        }elseif($data['Role'] == 'petugas'){
            $_SESSION['data'] = $data;
            header('location: dashboard.php?page=user');

        } else {
            $_SESSION['data'] = $data;
            header('location: dashboard.php?page=user');
        }
    } else {
         echo "<script>";
       echo "alert('login gagal!');";
         echo "window.location.href ='index.php?page=login';";
         echo "</script>";
    }
    }
    public function logout()
    {
        session_destroy();
        echo "<script>";
       echo "alert('berhasil logout!');";
         echo "window.location.href ='index.php?page=login';";
         echo "</script>";
    }

}