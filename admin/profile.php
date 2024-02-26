<?php 

require_once "include/header.php";
?>
 <?php  
    


    // databaseconnection
    require_once "../connection.php";

    $sql_command = "SELECT * FROM ecom_admin WHERE adminemail = '$_SESSION[adminemail]' ";
    $result = mysqli_query($conn , $sql_command);

    if( mysqli_num_rows($result) > 0){
       while( $rows = mysqli_fetch_assoc($result) ){
           $amdinfastname = ucwords($rows["amdinfastname"]);
           $amdinlastname = ucwords($rows["amdinlastname"]);
        //    $dob= $rows["dob"];
        //     $dp = $rows["dp"];
       }

       if( empty($amdinlastname)){
           $amdinlastname = "Not Defined";
       }

    //    if( empty($dob)){
    //         $dob = "Not Defined";
    //         $age = "Not Defined";
    //     }
}
 ?>
<style>
    body{
        background: linear-gradient(#7571f9, #ffffff);
    }
</style>

<div class=container>
    <div class="row ">
        <div class="col-4 ">
        </div>
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card shadow" style="width: 20rem;">
            <!-- <img src="upload/<?php if(!empty($dp)){ echo $dp; }else{ echo "1.jpg"; } ?>" class="rounded img-fluid  card-img-top"  style="height: 300px "  alt="..."> -->
                <div class="card-body">
                <h2 class="text-center mb-4"  style="color:#7571f9"><?php echo $amdinfastname; ?> </h2>
                    <!-- <p class="card-text">Email: <?php echo $_SESSION["email"] ?> </p> -->
                    <p class="card-text">amdinlastname: <?php echo $amdinlastname ?> </p>
                    <!-- <p class="card-text">Date of Birth: <?php echo $dob ?> </p> -->
                    <!-- <p class="card-text">Age: <?php if( $dob != "Not Defined"){  
                                                    $date1=date_create($dob);
                                                    $date2=date_create("now");
                                                    $diff=date_diff($date1,$date2);
                                                    echo $diff->format("%y Years"); }?> 
                    </p>
                     -->
                    <!-- <p class="text-center">
                    <a href="edit-profile.php" class="btn btn-outline-primary">Edit Profile</a>
                    <a href="change-password.php" class="btn btn-outline-primary">Change Password</a>
                    <a href="profile-photo.php" class="mt-2 btn btn-outline-primary">Change profile photo</a> -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
require_once "include/footer.php";
?>