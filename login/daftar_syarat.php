<?php  
    //start the session
    session_start();

    if (!isset($_SESSION)) {
        echo 'ada';
        exit();
        //echo'<script> window.location="index.php"; </script> ';
    }

    $_SESSION['is_data_student_exist'] = "";
    $_SESSION['is_data_account_exist'] = "";

    if(isset($_POST['submit'])){
        foreach ($_POST as $key => $val) {
            ${$key} = $val;
            $_SESSION[''.$key.''] = $val;
        }

       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Penerimaan Siswa Baru</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/main.css">

</head>
<body>
    <div class="container">

     

        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
                <div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Data Pendaftar</h4>
                        <p class="category">Periksan data anda dibawah, pastikan sudah benar</p>
                    </div>
                    <div class="card-content table-responsive">
                        
                        <a href="daftar_siswa_baru.php" class="btn btn-primary pull-right" ><i class="fa fa-pencil"></i> Edit Data</a>
                        <h3 style="overflow: hidden;"><b>Data Calon Siswa</b></h3>
                        <table class="table table-hover">
                        
                            <tbody>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>:<?php isset($_SESSION['email'])  ?  print($_SESSION['email']) : ""; ?> <a href="daftar_akun.php" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a></td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td>: <?php isset($_SESSION['nama'])  ?  print($_SESSION['nama']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>NISN</b></td>
                                    <td>: <?php isset($_SESSION['nisn'])  ?  print($_SESSION['nisn']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>TTL</b></td>
                                    <td>: <?php isset($_SESSION['tempat_lahir'])  ?  print($_SESSION['tempat_lahir']) : ""; ?>, <?php isset($_SESSION['tanggal_lahir'])  ?  print($_SESSION['tanggal_lahir']) : "2009-01-01"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <td>: <?php isset($_SESSION['jenis_kelamin']) && $_SESSION['jenis_kelamin'] == "L" ? print("Laki-laki") : print("Perempuan") ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat :</b></td>
                                    <td>: <?php isset($_SESSION['alamat'])  ?  print($_SESSION['alamat']) : ""; ?> </td>
                                </tr>
                                <tr>
                                    <td><b>Jarak Kesekolah</b></td>
                                    <td>: <?php isset($_SESSION['jarak'])  ?  print($_SESSION['jarak']) : ""; ?>  </td>
                                </tr>
                                <?php $gaji=number_format($_SESSION['gaji'],0,",","."); ?>
                                <tr>
                                    <td><b>Gaji Orang Tua</b></td>
                                    <td>: <?php echo "Rp. "; isset($gaji)  ?  print($gaji) : ""; ?>
                                    </td>
                                </tr>          
                            </tbody>
                        </table>

                        
                        <hr>Anda yakin data diatas benar?
                        <a href="proses_simpan_pendaftaran.php" class="btn btn-primary pull-right">Yakin, kirim data pendaftaran</a>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

