<?php session_start(); 
require('component/config.php');
require('component/myfunctions.php');
if(!isset($_SESSION['userDetails'])){
    header('Location: '.$baseUrl.'/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        require('assets/bootstrap/bootstraplib.php');
    ?>
</head>
<body>
    <a href="logout.php">LogOut</a>
    <div class="container">
        <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">S.No</th>
            <th scope="col">Column Name</th>
            <th scope="col">Value</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($_SESSION['userDetails'] as $key => $value) { ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php $i++; } ?>
            
        </tbody>
        </table>
        <?php if($_SESSION['userDetails']['user_type'] == 'admin'){ ?>
        <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">User Type</th>
            </tr>
        </thead>
        <tbody>
            <?php $userDetails = getAllUserDetails(); $i = 1; foreach ($userDetails as $userDetail) { ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $userDetail['name']; ?></td>
                    <td><?php echo $userDetail['contact_number']; ?></td>
                    <td><?php echo $userDetail['email']; ?></td>
                    <td><?php echo ucfirst($userDetail['user_type']); ?></td>
                </tr>
            <?php $i++; } ?>
        </tbody>
        </table>
        <?php } ?>
    </div>
    
</body>
</html>