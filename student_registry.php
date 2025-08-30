<?php
// Database connection
include'db-connect.php';

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($_SESSION["is_authenticated"]) || $_SESSION["is_authenticated"] !== true) {
    header("Location: ./");
    exit;
}
$courses = [];
$coursQuery = "SELECT * FROM student_course";
$coursResult = $conn->query($coursQuery);
while ($row = $coursResult->fetch_assoc()) {
    $courses[] = $row;
}
$yearrs = [];
$yearssQuery = "SELECT * FROM student_year";
$yearssResult = $conn->query($yearssQuery);
while ($row = $yearssResult->fetch_assoc()) {
    $yearrs[] = $row;
}
// courses
$courseQuery = "SELECT * FROM student_course";
$courseResult = $conn->query($courseQuery);

// student years
$yearQuery = "SELECT * FROM student_year";
$yearResult = $conn->query($yearQuery);


$nameQuery = "SELECT * FROM student_infoo";
$nameResult = $conn->query($nameQuery);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $student_id = $_POST["student_id"];
    $student_fname = $conn->real_escape_string($_POST["student_fname"]);
    $student_lname = $conn->real_escape_string($_POST["student_lname"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $contact = $conn->real_escape_string($_POST["contact"]);
    $gender = $conn->real_escape_string($_POST["gender"]);
    $course_id = $_POST["course"];
    $year_id = $_POST["year"];

    $updateQuery = "UPDATE student_infoo 
                    SET student_fname='$student_fname', student_lname='$student_lname', 
                        email='$email', username='$username',password='$password',contact='$contact', gender='$gender', course_id='$course_id', year_id='$year_id' 
                    WHERE student_id=$student_id";

                    $details = "Update student ID $student_id";
$conn->query("INSERT INTO audit_log (user_id, action, details) 
              VALUES ($user_id, 'Update Student', '$details')");

    if ($conn->query($updateQuery) === TRUE) {
        echo "<script>alert('Updated successfully!'); window.location='student_registry.php';</script>";
        exit;
    } else {
        echo "Error updating student: " . $conn->error;
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
        .i,.bi{
            font-size: 20px;
        }
        body {
            margin-top: 20px;
            border-collapse: collapse;
        }
        table {
            width: 100%;
           
            border-collapse: collapse;
            margin-top: 20px;
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
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}
.close:hover {
    color: black;
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
</head>
<body id="body-pd">

<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' style="font-size: 40px;" id="header-toggle"></i></div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="dash.php" class="nav_logo">
                    <div class="header_img"   > <img src="./img/1739566967442.jpg" alt=""> </div>
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
                    <a href="student_registry.php" class="nav_link active" >
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


    <form action="" method="POST">
                <div class="col mt-0">
                    <div class="card-header bg-warning text-black text-center"><h3> Student Registry </h3>
                    </div>
                    <div class="card_body">
                        <div class="row">
                            
                        <div class="col-3">
                <label for="student_name">Search Student#: </label>
              <input type="text" name="name" placeholder="Enter Student #">
                </div>
                            <div class="col-4">
                                <label>Select Course:</label>
                                <select class="form-select form-select-sm" name="course">
                                    <option value="">All Courses</option>
                                    <?php while ($row = $courseResult->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label>Select Year:</label>
                                <br>
                                <select class="form-select form-select-sm" name="year">
                                    <option value="">All Years</option>
                                    <?php while ($row = $yearResult->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['year_id']; ?>"><?php echo $row['year_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <br>
                                <button type="submit" name="submit" class="btn btn-outline-success">Submit</button>
                            </div>
                            <div class="col-1 mt-2 ">
                    <br>
                    <a href="./archive/viewdelete.php">
                    <button type="button" class="btn btn-outline-danger">Archive</button>
                    </a>
                 </div>
                        </div>
                    </div>
                </div></form>
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h3>Result</h3>
                        </div>
                        <div class="theader">
                        <table boarder="1" cellpadding="5" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Student#</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Program</th>
                                        <th>Birth Day</th>
                                        <th>Email</th>
                                        <th>Reg#</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                        </div>
                                <tbody>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $course = $_POST['course'];
                                        $year = $_POST['year'];
                                        $name = $_POST['name'];
                                        $query = "SELECT student_infoo.student_id, student_infoo.student_fname, student_infoo.birth_date, student_infoo.student_lname, student_infoo.contact, 
          student_infoo.email, student_infoo.username, student_infoo.password, student_infoo.reg_number, student_infoo.gender,
          student_course.course_name, student_course.course_init, student_year.year_name, student_infoo.course_id,student_year.year_id,
          student_infoo.school_year, student_infoo.id
          FROM student_infoo
          JOIN student_course ON student_infoo.course_id = student_course.course_id
          JOIN student_year ON student_infoo.year_id = student_year.year_id
          WHERE student_infoo.is_archived = 0"; 
          


                                        if (!empty($course)) {
                                            $query .= " AND student_infoo.course_id = '$course'";
                                        }
                                        if (!empty($year)) {
                                            $query .= " AND student_infoo.year_id = '$year'";
                                        }
                                        if (!empty($name)) {               
                                            // Split the search term into parts                                    
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
                                                        <td>{$row['course_init']}</td>
                                                        <td>{$row['birth_date']}</td>
                                                        <td>{$row['email']}</td>
                                                        <td>{$row['reg_number']}</td>
                                                        <td>{$row['gender']}</td>
                                                        <td>{$row['contact']}</td>
                                                        <td>{$row['year_name']}</td>
                                                        <td>
                                                            <form action='student_history.php' method='POST' style='display:inline;'>
                                                                <input type='hidden' name='student_id' value='" . htmlspecialchars($row['student_id']) . "'>
                                                                <button type='submit' class='btn btn-sm btn-primary'>View</button>
                                                            </form>
                                                            </td>
                                                            <td>
                                                            
            <button 
                type='button' 
                class='btn btn-success btn-sm open-edit-modal' 
                data-bs-toggle='modal' 
                data-bs-target='#editStudentModal'
                data-student-id='{$row['student_id']}'
                data-first-name='{$row['student_fname']}'
                data-last-name='{$row['student_lname']}'
                data-email='{$row['email']}'
                data-username='{$row['username']}'
                data-password='{$row['password']}'
                data-contact='{$row['contact']}'
                data-gender='{$row['gender']}'
                data-course-id='{$row['course_id']}'
                data-year-id='{$row['year_id']}'>
                
                Edit
            </button>
            </td>
            <td>
                <form action='./archive/archive_student.php' method='POST' style='display:inline;'>
      <input type='hidden' name='student_id' value='" . htmlspecialchars($row['student_id']) . "'>
      <button 
        type='button' 
        class='btn btn-danger btn-sm open-archive-modal' 
        data-student-id='" . $row['student_id'] . "' 
        data-bs-toggle='modal' 
        data-bs-target='#passwordConfirmModal'>
        Archive
      </button>
    </form>
  </td> </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>No records found</td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            
                        </div>
                </div>
            </form>
            
        </div>
    </div>
    </div>
    
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
    <form method="POST" id="editStudentForm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Edit Student Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <input type="hidden" name="student_id" id="student_id">
                    
                        <div class="mb-2">
                      <label>First Name</label>
                      <input type="text" name="student_fname" id="student_fname" class="form-control" required>
                        </div>
                        <div class="mb-2">
                        <label for="student_lname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="student_lname" id="student_lname" required>
                        </div>
                        <div class="mb-2">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-2">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-2">
                        <label for="password" class="form-label">Password:</label>
                        <input type="text" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="mb-2">
                        <label for="contact" class="form-label">Contact:</label>
                        <input type="text" class="form-control" name="contact" id="contact" required>
                        </div>
                        <div class="mb-2">
                        <label for="gender" class="form-label">Gender:</label>
                        <select class="form-select" name="gender" id="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        </div>
                        <div class="mb-2">
                        <label for="course" class="form-label">Select Course:</label>
<select class="form-select" name="course" id="course" required>
    <option value="">Select Course</option>
    <?php foreach ($courses as $row) { ?>
        <option value="<?= htmlspecialchars($row['course_id']) ?>"><?= htmlspecialchars($row['course_init']) ?></option>
    <?php } ?>
</select>
                        </div> 
                        <div class="mb-2">
                            <label for="year" class="form-label">Select Year:</label>
<select class="form-select" name="year" id="year" required>
    <option value="">Select Year</option>
    <?php foreach ($yearrs as $row) { ?>
        <option value="<?= htmlspecialchars($row['year_id']) ?>"><?= htmlspecialchars($row['year_name']) ?></option>
    <?php } ?>
</select>
                        </div>

                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div> 
<div class="modal fade" id="passwordConfirmModal" tabindex="-1" aria-labelledby="passwordConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="./archive/archive_student.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Password to Archive</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="student_id" id="archive_student_id">
          <div class="mb-3">
            <label for="admin_password" class="form-label">Enter your password:</label>
            <input type="password" class="form-control" id="admin_password" name="admin_password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Confirm Archive</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script>
  document.querySelectorAll('.open-archive-modal').forEach(button => {
    button.addEventListener('click', function () {
      const studentId = this.getAttribute('data-student-id');
      document.getElementById('archive_student_id').value = studentId;
    });
  });



   document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.open-edit-modal');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const studentId = this.getAttribute('data-student-id');
            const firstName = this.getAttribute('data-first-name');
            const lastName = this.getAttribute('data-last-name');
            const email = this.getAttribute('data-email');
            const username = this.getAttribute('data-username');
            const password = this.getAttribute('data-password');
            const contact = this.getAttribute('data-contact');
            const gender = this.getAttribute('data-gender');
            const courseId = this.getAttribute('data-course-id');
            const yearId = this.getAttribute('data-year-id');

            document.getElementById('student_id').value = studentId;
            document.getElementById('student_fname').value = firstName;
            document.getElementById('student_lname').value = lastName;
            document.getElementById('email').value = email;
            document.getElementById('username').value = username;
            document.getElementById('password').value = password;
            document.getElementById('contact').value = contact;
            document.getElementById('gender').value = gender;
            document.getElementById('course').value = courseId;
            document.getElementById('year').value = yearId;
        });
    });
});

</script>
</body>
</html>
