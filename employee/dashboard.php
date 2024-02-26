<?php 
require_once "include/header.php";
?>
<?php

        // database connection
        require_once "../connection.php";

         
        $i = 1;
        // total employee--------------------------------------------------------------------------------------------
        $select_emp = "SELECT * FROM employee";
        $total_emp = mysqli_query($conn , $select_emp);

        // highest paid employee--------------------------------------------------------------------------
        $sql_highest_salary =  "SELECT * FROM employee ORDER BY id ASC";
        $emp_ = mysqli_query($conn , $sql_highest_salary);
       
        $sql = "SELECT * FROM tickets";
        $result = mysqli_query($conn, $sql);
        $notValidatedCount = mysqli_num_rows($result); // Number of tickets not yet validated
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
.arc-border{
     border: 3px solid #7571f9;
            border-radius: 20px;
}
.course-card {
            height: 190px;
            margin-bottom: 10px;
            padding:20px;
            background-color: white;
            border: 1px solid #7571f9;
            cursor: pointer;
            transition: transform 0.3s ease;
            border: 3px solid #7571f9;
            border-radius: 20px;

        }

        .course-card:hover {
            transform: scale(1.05);
        }

        table.table-hover {
    border-collapse: collapse;
    width: 100%;
  }

  table.table-hover th,
  table.table-hover td {
    border: 1px solid black;
    padding: 15px;
  }

</style>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            var courseCards = document.getElementsByClassName("course-card");

            for (var i = 0; i < courseCards.length; i++) {
                courseCards[i].addEventListener("click", function () {
                    var courseContent = this.nextElementSibling;
                });
            }
        });
    </script>
<div class="container">

    <div class="row mt-5">

    <div class="col-6">
        <div class="course-card">
                <ul class="list-group list-group-flush">
                    <li style="color:#7571f9;" class="list-group-item text-center"> <b>Employees</b>  </li>
                    <li class="list-group-item">Total Employees : <?php echo mysqli_num_rows($total_emp); ?></li>
                    <li  class="list-group-item text-center"><a href="view-employee.php"> <b style="color:#7571f9;">View All Employees</b></a></li>
                </ul>
            </div>
        </div>
       
        <div class="col-6">
        <div class="course-card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"> <b style="color:#7571f9;"> Tickets</b></li>
                    <li class="list-group-item">Tickets Not Yet Validated: <?php echo $notValidatedCount; ?></li>
                </ul>
            </div>
        </div>
        
        
    </div>
        
    
    <div class="row mt-5 bg-white shadow arc-border"> 
    
    <div class="col-12">
            <div class=" text-center my-3 "> 
                <h4 class='text-center pb-2' style="color:#7571f9">Employee Leadership Board</h4> </div>
            <table style="width:100%" class="table  table-hover">
        <thead>
            <tr class="bg-dark">
            <th scope="col">Employee's Id</th>
            <th scope="col">Employee's Name</th>
            <th scope="col">Employee's Email</th>
            <th scope="col">Salary in Dh.</th>
            </tr>
        </thead>
        <tbody>
        <?php while( $emp_info = mysqli_fetch_assoc($emp_) ){
                    $emp_id = $emp_info["id"];
                    $emp_name = $emp_info["name"];
                    $emp_email = $emp_info["email"];
                    $emp_salary = $emp_info["salary"];
                    ?>
            <tr>
            
            <th ><?php echo $emp_id; ?></th>
            <td><?php echo $emp_name; ?></td>
            <td><?php echo $emp_email; ?></td>
            <td><?php echo $emp_salary; ?></td>
            </tr>

          <?php  
        //   $i++; 
                } 
            ?>
        </tbody>
        </table>
        
    </div>
    </div>
</div>

<?php 
require_once "include/footer.php";
?>