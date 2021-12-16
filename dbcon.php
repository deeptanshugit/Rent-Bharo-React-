 <?php

$server = "localhost";
$user = "root";
$password = "";
$db = "wtdb";

$con = mysqli_connect($server,$user,$password,$db);

if($con){
    ?>
    <script>
        alert('connect Done');
    </script>

    <?php
}else{
    ?>
    <script>
        alert('No connect Done');
    </script>

    <?php
}
?>