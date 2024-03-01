<?php
 require('config/auth.php');
 $cek = new Auth;
 
    require('layout/auth/header.php');

     if(!isset($_GET['page'])){
      echo "<script>";
      echo "alert('Harus Login Dulu!');";
        echo "window.location.href ='index.php?page=login';";
        echo "</script>";
     }

     if($_GET['page'] == 'login'){
        require('login.php');
     } elseif ($_GET['page'] == 'register'){
       require('register.php');
     } elseif($_GET['page'] == 'postlogin'){
     $cek->login($_POST['Email'],$_POST['Password']);
    } elseif($_GET['page'] == 'postregister'){
      $data['Username'] = $_POST['Username'];
      $data['Password'] = $_POST['Password'];
      $data['Email'] = $_POST['Email'];
      $data['NamaLengkap'] = $_POST['NamaLengkap'];
      $data['Alamat'] = $_POST['Alamat'];
      if (isset($_POST['register_tombol'])) {
        $cek->register($data);
      }else {
        echo "<script>alert('Register dulu!');window.location.href ='index.php?page=login'</script>";
      }
      
      
  }
                  elseif($_GET['page'] == 'logout'){
                    $cek->logout();
   }
     require('layout/auth/footer.php');
?>