<?php

include'db-connect.php';
session_start();
if (!isset($_SESSION["is_authenticated"]) || $_SESSION["is_authenticated"] !== true) {
    header("Location: ./");
    exit;
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Record</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="./js/dash.js"></script>
    <link rel="stylesheet" href="./css/das.css">
    <style>
               .bi{
            font-size: 20px;
        
        }
        .carddash {
    background-color: #f8f9fa; 
    border: 1px solid #ced4da; 
    border-radius: 8px; 
    padding: 20px; 
    width: 300px; 
    height: 150;
    text-align: center; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    transition: transform 0.2s; 
}
.header_img {
    width: 35px;
    height: 35px;
    display: flex;
    margin: -10px;
    justify-content: left;
    border-radius: 50%;
    overflow: hidden;
 
    
}
 </style>
</head>
<body id="body-pd">
<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' style="font-size: 40px;" id="header-toggle"></i> 
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="dash.php" class="nav_logo">
                    <div class="header_img"  > <img src="./img/1739566967442.jpg" alt=""> </div>
                    <span class="nav_logo-name">CDSL</span>
                </a>
                <div class="nav_list">
                    <a href="dash.php" class="nav_link">
                        <i class="bi bi-columns nav_icon"></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="student_access.php" class="nav_link active">
                        <i class="bi bi-person-lines-fill "></i>
                        <span class="nav_name">Student Access</span>
                    </a>
                    <a href="student_registry.php" class="nav_link" >
                    <i class="bi bi-person-fill-gear"></i>
                        <span class="nav_name">Student Registry</span>
                    </a>
                    <a href="student_section.php" class="nav_link">
                    <i class="bi bi-people-fill"></i>
                        <span class="nav_name">Student Section</span>
                    </a>
                    <a href="./student_add/register_step1.php" class="nav_link">
                    <i class="bi bi-person-plus-fill " ></i>
                        <span class="nav_name">Add Student</span>
                    </a>
                    <a href="add_grades/index.php" class="nav_link">
                    <i class="bi bi-ui-checks"></i>
                        <span class="nav_name">Add Grades</span>
                    </a>
                </div>
            </div>
            <a href="logout.php" class="nav_link">
            <i class="bi bi-box-arrow-left"></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
    
    
    <form method="POST">
        <div class="card-header  bg-warning text-black  text-center"><h3>Student Access Management</h3></div>
         <div class="card_body">
            
                 <div class="row mt-3">
                <div class="col-3">
                    <a href="./request/requestform.php">
        <div class="carddash">
            <div class="d-flex align-items-center mb-3"> 
                <i class="bi bi-file-earmark-text" style="font-size: 30px; margin-right: 10px;"></i>
            </div>
            <p>Form Request</p>
        </div>
        </a>
                </div>
                <div class="col-3">
                    <a href="./request/missingreq.php">
        <div class="carddash">
            <div class="d-flex align-items-center mb-3"> 
                <i class="bi bi-person-plus" style="font-size: 30px; margin-right: 10px;"></i>
            </div>
            <p>Pending Requirements</p>
        </div></a>
                </div>
                <div class="col-3">
                    <a href="backup/backup.php">
        <div class="carddash">
            <div class="d-flex align-items-center mb-3"> 
                <i class="bi bi-cloud-upload" style="font-size: 30px; margin-right: 10px;"></i>
            </div>
            <p>Back Up</p>
        </div>
        </a>
                </div>
      
        </div>       
    </form>
    <br>
  
         </div>
        </div>
    <div class="dashboard">

    </div>

    </div>
    </div>

</body>
</html>