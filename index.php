<?php 

session_start();

if (empty($_SESSION['username'])){
  
    header('location:login.php');
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
    <title>BMI</title>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
</head>
<style>
body {
    padding: 20px 20%;
}
form {
    padding: 10px 20px;
    background-color: #f5f5f5;
    border: solid thin #EEE;
}
input, select {
    padding: 6px 12px;
}
.hasil {
    padding: 10px 20px;
    background-color: #900;
    color: #FFF;
    border: solid thin #600;
}
</style>
</head>

<body>
<h1>Menghitung BMI</h1>

<?php
// Action form
if (isset($_GET['submit'])) {
    // Input form
    $nama        = $_GET['nama'];
    $kelamin    = $_GET['kelamin'];
    $tb            = $_GET['tb']/100;
    $bb            = $_GET['bb'];
    /* Rumus BMI adalah:
    BMI = BERAT BADAN / KUADRAT TINGGI BADAN
    */    
    // Hitung BMI
    $bmi        = $bb / ($tb * $tb);
    // Mencetak hasil
    echo '<div class="hasil">';
    echo "<h3>Hasil perhitungan BMI</h3>";
    echo "Nama Anda: $nama<br>";
    echo "Jenis kelamin: $kelamin<br>";
    echo "Tinggi Badan: $tb meter<br>";
    echo "Berat Badan: $bb kilogram<br>";
    echo "<hr>BMI Anda: ".number_format($bmi);
    echo "<h4>Kesimpulan:</h4>";
    // Menghitung dan mencetak kesimpulan
    if($bmi < 15.5) {
        echo "Anda mengalami anoreksia";
    }elseif ($bmi < 18.5 ) {
        echo "Anda mengalami kekurangan gizi";
    }elseif ($bmi < 25 ) {
        echo "Anda memiliki berat badan normal";
    }elseif ($bmi < 30 ) {
        echo "Anda memiliki overweight";
    }elseif ($bmi < 35 ) {
        echo "Anda mengalami Obesitas Level 1";
    }elseif ($bmi < 40 ) {
        echo "Anda mengalami Obesitas Level 2";
    }else {
        echo "Anda mengalami Obesitas Akut";
    }
    // closing div
    echo '</div>';
}
?>

<form    methot="get" action="">
Nama<br>
<input type="text" name="nama"><br>
Jenis kelamin<br>
<select name="kelamin">
    <option value="Laki-laki">Laki-laki</option>
    <option value="Perempuan">Perempuan</option>
</select><br>
Tinggi badan (cm) <br>
<input type="text" name="tb"><br>
Berat badan (kg)<br>
<input type="text" name="bb"><br>
<input type="submit" name="submit" value="Hitung BMI">
<a class="btn btn-link pull-right" href="logout.php">Logout</a>
</form>
</body>
</html>

<?php
}
?>

           