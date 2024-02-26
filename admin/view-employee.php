
<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM employee";
$result = mysqli_query($conn , $sql);

// $i = 1;
$you = "";


?>

<style>
    body{
        background: linear-gradient(#7571f9, #ffffff);
    }
table, th, td {
  border: 1px solid black;
  padding: 15px;
  
}
table {
  border-spacing: 10px;
     
}
.arc-border {
    /* border: 1px solid #000000; */
            /* transition: transform 0.3s ease; */
            border: 3px solid #7571f9;
            border-radius: 20px;
}

</style>
<br><br><br>

<div class="container bg-white shadow arc-border">
    <div class="py-4 mt-5"> 
    <h4 class='text-center pb-2' style="color:#7571f9">All Employees</h4>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
        
        <th>Employee Id</th>
        <th>Name</th>
        <th>Email</th> 
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Age</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $name= $rows["name"];
            $email= $rows["email"];
            $dob = $rows["dob"];
            $gender = $rows["gender"];
            $id = $rows["id"];
            if($gender == "" ){
                $gender = "Not Defined";
            } 

            if($dob == "" ){
                $dob = "Not Defined";
                $age = "Not Defined";
            }else{
                $date1=date_create($dob);
                $date2=date_create("now");
                $diff=date_diff($date1,$date2);
                $age = $diff->format("%y Years"); 
            }

            if($email == $_SESSION["email"] ){
                $name = "{$name} (You)";
            }  
            
            ?>
        <tr>
        
        <td><?php echo $id; ?></td>
        <td> <?php echo $name ; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $dob; ?></td>
        <td><?php echo $age; ?></td> 

    <?php 
            // $i++;
            }
        }else{
        echo "no admin found";
        }
    ?>
     </tr>
    </table>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>

<?php 
    require_once "include/footer.php";
?>