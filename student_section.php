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

$sectionQuery = "SELECT * FROM sections";
$sectionResult = $conn->query($sectionQuery);

$selectedCourseName = '';
$selectedYearName = '';
$selectedSectionName = '';

if (isset($_POST['search'])) {
    $selectedCourse = $_POST['course'];
    $selectedYear = $_POST['year'];
    $selectedSection = $_POST['section'];

    if (!empty($selectedCourse)) {
        $getCourseName = $conn->query("SELECT course_name FROM student_course WHERE course_id = '$selectedCourse'");
        if ($getCourseName && $getCourseName->num_rows > 0) {
            $selectedCourseName = $getCourseName->fetch_assoc()['course_name'];
        }
    }

    if (!empty($selectedYear)) {
        $getYearName = $conn->query("SELECT year_name FROM student_year WHERE year_id = '$selectedYear'");
        if ($getYearName && $getYearName->num_rows > 0) {
            $selectedYearName = $getYearName->fetch_assoc()['year_name'];
        }
    }

    if (!empty($selectedSection)) {
        $getSectionName = $conn->query("SELECT section_name FROM sections WHERE section_id = '$selectedSection'");
        if ($getSectionName && $getSectionName->num_rows > 0) {
            $selectedSectionName = $getSectionName->fetch_assoc()['section_name'];
        }
    }
    
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
        table {
            width: 100%;
           
            border-collapse: collapse;
            margin-top: 20px;
        }
        body{margin-top: 20px;
            border-collapse: collapse}
        table, th, td {
            border: 1px solid black;
            padding: 3px;
            text-align: center;
            font-size: 15px;
        }
        @media print {
            .print-btn, .card_bbody,.header,.card-header, .l-navbar,.filter-form {
                display: none;
            }
        }
        .bi{
            font-size: 20px;
        }.header_img {
    width: 35px;
    height: 35px;
    display: flex;
    margin: -10px;
    justify-content: left;
    border-radius: 50%;
    overflow: hidden;
 
    
}
        
 </style>
  <script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body id="body-pd">
<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' style="font-size: 40px;" id="header-toggle"></i> </div>
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
                    <a href="student_access.php" class="nav_link">
                        <i class="bi bi-person-lines-fill nav_icon"></i>
                        <span class="nav_name">Student Access</span>
                    </a>
                    <a href="student_registry.php" class="nav_link" >
                    <i class="bi bi-person-fill-gear"></i>
                        <span class="nav_name">Student Registry</span>
                    </a>
                    <a href="student_section.php" class="nav_link active">
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
    <div class="card-header text-black text-center  bg-warning fw-bold text-center my-0"><h3>Section</h3></div>
    <div class="card_bbody">
        <div class="row mt-2">
            <div class="col-3">
                <label>Select Course:</label>
                <select class="form-select form-select-sm" name="course">
                    <option value="">All Courses</option>
                    <?php
                    $courseQuery = "SELECT * FROM student_course";
                    $courseResult = $conn->query($courseQuery);
                    while ($row = $courseResult->fetch_assoc()) {
                        $selected = (isset($_POST['course']) && $_POST['course'] == $row['course_id']) ? "selected" : "";
                        echo "<option value='{$row['course_id']}' $selected>{$row['course_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-2">
                <label>Select Year:</label>
                <select class="form-select form-select-sm" name="year">
                    <option value="">All Year</option>
                    <?php
                    $yearQuery = "SELECT * FROM student_year";
                    $yearResult = $conn->query($yearQuery);
                    while ($row = $yearResult->fetch_assoc()) {
                        $selected = (isset($_POST['year']) && $_POST['year'] == $row['year_id']) ? "selected" : "";
                        echo "<option value='{$row['year_id']}' $selected>{$row['year_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-2">
                <label>Select Section:</label>
                <select class="form-select form-select-sm" name="section">
                    <option value="">All Section</option>
                    <?php
                    $sectionQuery = "SELECT * FROM sections";
                    $sectionResult = $conn->query($sectionQuery);
                    while ($row = $sectionResult->fetch_assoc()) {
                        $selected = (isset($_POST['section']) && $_POST['section'] == $row['section_id']) ? "selected" : "";
                        echo "<option value='{$row['section_id']}' $selected>{$row['section_name']}</option>";
                    }
                    ?>
                </select>
            </div>
                <div class="col-1 mt-2 ">
                    <br>
                    <button type="submit" name="search" class="btn btn-outline-success ">Submit</button>
                 </div>
                 <div class="col-1 mt-2 ">
                    <br>
                    <button class="print-btn btn-outline-success" onclick="printPage()">Print</button>
                 </div>
            </div>
                </div>
      
    </form>
    <br>
    <?php
if (!empty($selectedYearName)) {
    echo "<h5>Year: $selectedYearName</h5>";
}
if (!empty($selectedCourseName)) {
    echo "<h5>Course: $selectedCourseName</h5>";
}
if (!empty($selectedSectionName)) {
    echo "<h5>Section: $selectedSectionName</h5>";
}
?>
    <table boarder="1" cellpadding="5" cellspacing="0">
 
    <tr>
            <th>Student#</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>Section</th>
        </tr>

        <?php
        // Filtering logic
        if (isset($_POST['search'])) {
            $course = $_POST['course'];
            $year = $_POST['year'];
            $section = $_POST['section'];

            $query = "SELECT student_infoo.student_id, student_infoo.student_fname , student_infoo.student_lname ,student_infoo.contact, 
                             student_course.course_name,student_course.course_init, student_year.year_name ,student_infoo.img_id,
                             student_img.status, student_infoo.school_year, student_infoo.id, student_infoo.requirements , student_infoo.section_id,
                             sections.section_name
                      FROM student_infoo 
                      LEFT JOIN student_img ON student_infoo.img_id = student_img.img_id
                      JOIN student_course ON student_infoo.course_id = student_course.course_id
                      JOIN sections ON student_infoo.section_id = sections.section_id 
                      JOIN student_year ON student_infoo.year_id = student_year.year_id 
                      WHERE 1";

            if (!empty($course)) {
                $query .= " AND student_infoo.course_id = '$course'";
            }
            if (!empty($year)) {
                $query .= " AND student_infoo.year_id = '$year'";
            }
            if (!empty($section)) {
                $query .= " AND student_infoo.section_id = '$section'";
            }
            if (!empty($name)) {
                
        // Split the search term into parts
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
                            <td>{$row['course_init']}</td>
                            <td>{$row['year_name']}</td>
                            <td>{$row['section_name']}</td>
                       
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


</div>
</body>
</html>