<?php
$con =mysqli_connect("localhost","root","","testdb");
if(!$con){
    echo "connect nhi hua";
}

$updt =$_GET['updt'];

$sql=mysqli_query($con,"select * from practice where id='$updt'");
$row =mysqli_fetch_array($sql);
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
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <form action="" method="post">
                    <div>
                        <label for="">name</label>
                        <input type="text" value="<?php echo $row['name'];?>" name="name" class="form-control">
                    </div>
                    <div>
                        <label for="">email</label>
                        <input type="email" value="<?php echo $row['email'];?>" name="email" class="form-control">
                    </div>
                    <div>
                        <label for="">contact</label>
                        <input type="numbar"value="<?php echo $row['contact'];?>" name="contact" class="form-control">
                    </div>
                    <div>
                        <input type="submit" name="update" value="update" class="form-control btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];

    $query=mysqli_query($con,"update practice set name='$name',email='$email',contact='$contact' where id='$updt'");
    if($query){
        // echo " ho gya";
        header("location:insert.php");

    }
    else{
        echo "nhi hua";
    }
}
?>