<?php

include'db-connect.php';
session_start();
if (!isset($_SESSION["is_authenticated"]) || $_SESSION["is_authenticated"] !== true) {
    header("Location: ./");
    exit;
}

//courses
$courseQuery = "SELECT * FROM student_course";
$courseResult = $conn->query($courseQuery);

//student years
$yearQuery = "SELECT * FROM student_year";
$yearResult = $conn->query($yearQuery);

$idQuery = "SELECT * FROM student_year";
$idResult = $conn->query($idQuery);

$nameQuery = "SELECT * FROM student_infoo";
$nameResult = $conn->query($nameQuery);

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
        body{margin-top: 20px;
            border-collapse: collapse}
            table {
            width: 100%;
           
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 3px;
            text-align: center;
            font-size: 15px;
        }
                .edit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }.header_img {
    width: 35px;
    height: 35px;
    display: flex;
    margin: -10px;
    justify-content: left;
    border-radius: 50%;
    overflow: hidden;
}
   .modal {
    display: none; /* Hidden by default */
    position: fixed; 
    z-index: 1000; /* Stay on top */
    left: 0; top: 0;
    width: 100%; height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5); /* Black background with transparency */
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 10px;
    width: 100%;
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
            <div class="row mt-2">
                
            <div class="col-3">
                <label for="student_name">Search Student#: </label>
              <input type="text" name="name" placeholder="Enter Student #">
                </div>
            <div class="col-3 ">
                <label>Select Course:</label>
                  <select class="form-select form-select-sm" name="course">
                   <option value="">All Courses</option>
                        <?php while ($row = $courseResult->fetch_assoc()) { ?>
                   <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?></option>
                       <?php } ?>
                  </select>
            </div> <div class="col-3">
                   <label>Select Year:</label>
                 <select class="form-select form-select-sm" name="year">
                   <option value="">All Year</option>
                         <?php while ($row = $yearResult->fetch_assoc()) { ?>
                   <option value="<?php echo $row['year_id']; ?>"><?php echo $row['year_name']; ?></option>
                          <?php } ?>
                   </select>
               </div>
                <div class="col-1 mt-2 ">
                    <br>
                    <button type="submit" name="search" class="btn btn-outline-success ">Submit</button>
                 </div>
            </div>
      
        </div>       
    </form>
    <br>
  
    <table boarder="1" cellpadding="5" cellspacing="0">
    <tr>
            <th>Student#</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Contact</th>
            <th>Course</th>
            <th>Year</th>
            <th>Requirements</th>
            
            <th>Action</th>
        </tr>

        <?php
       
       
        if (isset($_POST['search'])) {
            $course = $_POST['course'];
            $year = $_POST['year'];
            $name = $_POST['name'];

            $query = "SELECT student_infoo.student_id, student_infoo.student_fname , student_infoo.student_lname ,student_infoo.contact, 
                             student_course.course_name,student_course.course_init, student_year.year_name ,student_infoo.img_id,
                             student_img.status, student_infoo.school_year, student_infoo.id, student_infoo.requirements
                      FROM student_infoo 
                      LEFT JOIN student_img ON student_infoo.img_id = student_img.img_id
                      JOIN student_course ON student_infoo.course_id = student_course.course_id 
                      JOIN student_year ON student_infoo.year_id = student_year.year_id 
                      WHERE 1";

            if (!empty($course)) {
                $query .= " AND student_infoo.course_id = '$course'";
            }
            if (!empty($year)) {
                $query .= " AND student_infoo.year_id = '$year'";
            }
            if (!empty($name)) {
                
       
                

        $searchParts = explode('-', $name);
        $id = isset($searchParts[0]) ? $searchParts[0] : '';
        $schoolYear = isset($searchParts[1]) ? $searchParts[1] : '';
        $studentId = isset($searchParts[2]) ? $searchParts[2] : '';

                $query .= " AND student_infoo.id = '$id' AND student_infoo.school_year = '$schoolYear' AND student_infoo.student_id = '$studentId'";
                        
            }

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}-{$row['school_year']}-{$row['student_id']}</td>
                            <td>{$row['student_lname']}</td>
                            <td>{$row['student_fname']}</td>
                            <td>{$row['contact']}</td>
                            <td>{$row['course_init']}</td>
                            <td>{$row['year_name']}</td>
                           <td>{$row['requirements']}</td>
                            
                        <td>
                           <form action='student_add/view_req.php' method='POST' style='display:inline;'>
                           <input type='hidden' name='student_id' value='" . htmlspecialchars($row['student_id']) . "'>
                              <button type='submit' class='edit-btn btn-success'>View</button>
                        </form> </td>
                          </tr>";                       
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
        }
        ?>
    </table>
         </div>
        </div>
    <div class="dashboard">



    </div>
    </div>

        <div class="col ">

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PHP Modal Example</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
     
      </div>

    </div>
  </div>
</div>
</body>
</html>