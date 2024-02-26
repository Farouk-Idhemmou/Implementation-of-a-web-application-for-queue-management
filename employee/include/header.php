<?php 
    session_start();
    if( empty($_SESSION["email_emp"]) ){
        header("Location: ./login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Employee Management System</title>
    
    <link href="../resorce/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>

    <style> 
     .hidden {
         display: none;
     }
     
     /* Assuming you are using Bootstrap */
/* You may need to adjust these styles to match your specific layout */
.header {
  height: 5rem;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #111B27;
  box-shadow: 0 1px 10px rgba(0, 0, 0, 0.15);
  transition: all .2s ease;
}

.header-content {
  padding: 0 1rem;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.text-center {
  flex: 1; /* This will make the text take up the available space between hamburger and logo */
}

.logo-container {
  display: flex;
  align-items: center;
  
}

.logo-img {
  width: 100px; /* Adjust the size of the logo as needed */
  height: 100px;
}
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

     





    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
   

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header"  style="backgroun; padding: 10px;" >
    <div class="brand-logo">
    
        <a>
            <span class="brand-title">
                
            </span>
        </a>
    </div>
</div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
    <div class="header-content clearfix">
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon" ><i  style="color:#d00412 ;" class="icon-menu"></i></span>
            </div>
        </div>
        <div class="text-center">
            <h2 class="pt-3" style="color:#d00412">Ticket Management System</h2>
        </div>
        <div class="logo-container">
            <img src="include/img/logo.png" alt="Logo" class="logo-img">
        </div>
    </div>
</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                   <br> <br>       
                    <li>
                        <a href="./dashboard.php"  >
                            <i class="icon-home menu-icon" style="color:#d00412 ;"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="./valider_tickets.php" >
                            <i class="fa fa-list-ul menu-icon" style="color:#d00412 ;"></i><span class="nav-text">Validate Tickets</span>
                        </a>
                    </li>

                    <li>
                        <a href="./view-employee.php" >
                            <i class="fa fa-list-ul menu-icon" style="color:#d00412 ;"></i><span class="nav-text">View All Employees</span>
                        </a>
                    </li>
                    <li>
                        <a href="./profile.php"  >
                         
                            <i class="fa fa-user menu-icon" style="color:#d00412 ;"></i><span class="nav-text">Profile</span>
                        </a>
                    </li>  
                    <li>
                        <a href="./logout.php" >
                            <i class="icon-logout menu-icon" style="color:#d00412 ;"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                                   
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">



        <div class="modal fade" id="showModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHead" class="modal-header">
                    <button id="modal_cross_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p id="addMsg" class="text-center font-weight-bold"></p>
                </div>
                <div class="modal-footer ">
                    <div class="mx-auto">
                        <a type="button" id="linkBtn" href="#" class="btn btn-primary" >Add Expense For the Day</a>
                        <a type="button" id="closeBtn" href="#" data-dismiss="modal" class="btn btn-primary">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
            <!-- row -->

            <div class="container-fluid">

            