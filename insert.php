<?php
$con =mysqli_connect("localhost","root","","testdb");
if(!$con){
    echo "connect nhi hua";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="" class="navbar-brand">happy</a>
        <form action=""class="d-flex">
            <input type="search" name="search" class="form-control">
            <input type="submit" name="find">
        </form>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <form action="" method="post">
                    <div>
                        <label for="">name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div>
                        <label for="">email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div>
                        <label for="">contact</label>
                        <input type="numbar" name="contact" class="form-control">
                    </div>
                    <div>
                        <input type="submit" name="add" class="form-control btn btn-success">
                    </div>
                </form>
            </div>
            <div class="col-lg-5">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>contact</th>
                        <th>action</th>
                    </tr>
                    <?php
                    if(isset($_GET['find'])){
                        $search=$_GET['search'];

                        $sql=mysqli_query($con,"select * from practice where name like '%$search%'");
                    }
                    else{
                        $sql =mysqli_query($con,"select * from practice");
                    }

                    while($row=mysqli_fetch_array($sql)){?>

                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td class="btn-group">
                            <a href="delete.php?del=<?php echo $row['id'];?>" class=" btn btn-danger">X</a>
                            <a href="update.php?updt=<?php echo $row['id'];?>" class=" btn btn-primary">edit</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['add'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];

    $query=mysqli_query($con,"insert into practice (name,email,contact)values('$name','$email','$contact')");
    if($query){
        // echo "insert ho gya";
        header("location:insert.php");

    }
    else{
        echo "nhi hua";
    }
}
?>