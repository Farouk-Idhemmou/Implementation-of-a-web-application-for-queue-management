<?php 

require_once "include/header.php";
?>
 <?php  
    


    // databaseconnection
    require_once "../connection.php";

    $sql_command = "SELECT * FROM employee WHERE email = '$_SESSION[email_emp]' ";
    $result = mysqli_query($conn , $sql_command);

    if( mysqli_num_rows($result) > 0){
       while( $rows = mysqli_fetch_assoc($result) ){
           $name = ucwords($rows["name"]);
           $gender = ucwords($rows["gender"]);
           $dob= $rows["dob"];
            $salary = $rows["salary"];   
            $dp = $rows["dp"];     
            $id = $rows["id"];
       }

       if( empty($gender)){
           $gender = "Not Defined";
       }else{
        $dob = date('jS F Y' , strtotime($dob) );
       }

       if( empty($dob)){
            $dob = "Not Defined";
            $age = "Not Defined";
        }else{
                $date1=date_create($dob);
                $date2=date_create("now");
                $diff=date_diff($date1,$date2);
                $age = $diff->format("%y Years"); 
        }
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
        <div class="col-12 col-lg-6 col-md-6" >
            <div class="card shadow" style="width: 22rem;">
                <img src="upload/<?php if(!empty($dp)){ echo $dp; }else{ echo "1.jpg"; } ?>" class="rounded img-fluid  card-img-top"  style="height: 300px "  alt="...">
                <div class="card-body">
                <h2 class="text-center mb-4" style="color:#7571f9"><?php echo $name; ?> </h2>
                    <p class="card-text">Email: <?php echo $_SESSION["email_emp"] ?> </p>
                    <p class="card-text">Employee Id: <?php echo $id ?> </p>
                    <p class="card-text">Gender: <?php echo $gender ?> </p>
                    <p class="card-text">Age: <?php echo $age; ?> 
                    </p>
                    <p class="card-text">Date of Birth: <?php echo $dob; ?> </p>
                    <p class="card-text">Salary: <?php echo $salary . " Dh."; ?> </p>
                    
                    <p class="text-center">
                    <a href="edit-profile.php" class="btn btn-outline-primary">Edit Profile</a>
                    <a href="change-password.php" class="btn btn-outline-primary">Change Password</a>
                    <a href="profile-photo.php" class="mt-2 btn btn-outline-primary">Change profile photo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
require_once "include/footer.php";
?>