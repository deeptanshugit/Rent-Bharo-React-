<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<title></title>

<body>
    <div class="main-div">
        <h1> List Of The Users Who Submitted The Form </h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th scope="col">id</th>
                    <th scope="col"> First Name </th>
                    <th scope="col"> Second Name </th>
                    <th scope="col"> Email Id </th>
                    <th scope="col"> Phone Number </th>
                    <th scope="col"> Language </th>
                    <th scope="col"> Update </th>
                    <th scope="col"> Delete </th>
                </thead>

                <?php

                include 'dbcon.php';

                $selectquery = " select * from registration ";

                $query = mysqli_query($con,$selectquery);

                $result = mysqli_fetch_assoc($query);

                while($result = mysqli_fetch_assoc($query)){

                ?>
                <tbody>
                    <tr>
                        <td> <?php echo $result['id']; ?> </td>
                        <td> <?php echo $result['firstname']; ?> </td>
                        <td> <?php echo $result['secondname']; ?> </td>
                        <td> <?php echo $result['emailid']; ?> </td>
                        <td> <?php echo $result['phonenumber']; ?> </td>
                        <td> <?php echo $result['language']; ?> </td>
                        <td> <a href="update.php?id=<?php echo $result['id'];?>"> <i class="fa fa-edit"> </i> <a> </td>
                        <td> <a href="delete.php?ids=<?php echo $result['id'];?>"> <i class="fa fa-trash"> </i> <a> </td>
                    </tr>
                </tbody>
                <?php

                }

                ?>
              </table>  
        </div>
    </div>
</body>
</html>