<?php
include'db-connect.php';


$student_id = isset($_POST['student_id']) ? intval($_POST['student_id']) : 0;
 

$sql = "SELECT student_history.year_id, student_history.semester, 
               subjects.sub_code, subjects.lab_hrs, subjects.lec_hrs, 
               subjects.sub_unit, subjects.sub_name, student_history.grade,
               student_infoo.student_fname,student_infoo.student_lname, 
               student_year.year_name , student_infoo.school_year
        FROM student_history 
        JOIN subjects ON student_history.sub_code = subjects.sub_code
        JOIN student_infoo ON student_history.student_id = student_infoo.student_id
        JOIN student_year ON student_history.year_id = student_year.year_id
        WHERE student_history.student_id = ? 
        ORDER BY student_history.year_id, student_history.semester";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    // Debugging: Print the row data to check values
    $grades[] = $row['grade'];

    $data[$row['year_name']][$row['semester']][] = $row;
}

$student_name = "Unknown"; 
$course_name = "Unknown"; 
$school_year = "Unknown"; 
$sql = "SELECT student_infoo.student_fname ,student_infoo.student_lname ,student_infoo.school_year, student_course.course_name, student_course.course_init 
        FROM student_infoo 
        JOIN student_course ON student_infoo.course_id = student_course.course_id 
        WHERE student_infoo.student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $student_fname = $row['student_fname'];
    $student_lname = $row['student_lname'];
    $course_init = $row['course_init'];
    $school_year = $row['school_year'];
}

$stmt->close();
$conn->close();

function determineGradeStatus($grades) {
    $count5 = 0; // Count of 5.0
    $count3 = 0; // Count of 3.00
    foreach ($grades as $grade) {
        if ($grade == 5.00) {
            $count5++;
        } elseif ($grade == 3.00) {
            $count3++;
        }
    }
    // Determine the status based on the criteria
    if ($count5 >= 3) {
        return "Off Track";
    } elseif ($count3 >= 1) {
        return "On Track";
    } else {
        return "Good Track";
    }
}
// Calculate the student's grade status
$grade_status = "N/A"; // default if no data

if (!empty($grades)) {
    $grade_status = determineGradeStatus($grades);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h5,h3 {
            text-align: left;
            margin-top: 0;

        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 2px;
            text-align: center;
        }
        th {
            background-color:rgb(147, 158, 147);
            color: white;
        }
        .print-btn {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            background-color: #008CBA;
            color: white;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }
        @media print {
            .print-btn {
                display: none;
            }
            .back-btn {
                display: none;
            }
            .text{display: none;}
            .container {
                box-shadow: none;
                border: none;
            }
        }
        
        .good-track {

color: green;
}
.on-track {
color: darkorange;
}
.off-track{

color: red;
}
    </style>

     <script>
        function printPage() {
            window.print();
        }
    </script>
    
</head>
<body>
    <a href="./student_registry.php">
<button class="back-btn" id="back-btn">Back</button></a>
<div class="container">
    <h5>Student ID: <?php echo $student_id; ?></h5>
        <h5>Name : <?php echo htmlspecialchars($student_fname); ?><?php echo htmlspecialchars($student_lname); ?></h5>
        
        <?php if (empty($data)): ?>
            <p>No records found for this student.</p>
        <?php else: ?>
            <?php foreach ($data as $year => $semesters): ?>
                <?php foreach ($semesters as $semester => $subjects): ?>
                    <h5>Student Year: <?php echo $year; echo" / "; echo $semester; echo " " . "Semester";
                    echo" / "; echo htmlspecialchars($course_init); echo" / "; echo htmlspecialchars($school_year); ?></h5>
                    <table>
                        <tr>
                            <th>Grade</th>
                            <th>Code</th>
                            <th>Subject Description</th>
                            <th>Units</th>
                            <th>Lec Hrs</th>
                            <th>Lab Hrs</th>
                        </tr>
  <?php 
        $total_units = 0;
        $total_lec_hrs = 0;
        $total_lab_hrs = 0;
foreach ($subjects as $subject): 
    $total_units += $subject['sub_unit'];
    $total_lec_hrs += $subject['lec_hrs'];
    $total_lab_hrs += $subject['lab_hrs'];
?>
    <tr>
        <td><?php echo $subject['grade']; ?></td>
        <td><?php echo $subject['sub_code']; ?></td>
        <td><?php echo $subject['sub_name']; ?></td>
        <td><?php echo $subject['sub_unit']; ?></td>
        <td><?php echo $subject['lec_hrs']; ?></td>
        <td><?php echo $subject['lab_hrs']; ?></td>
    </tr>
   <?php endforeach; ?>
     <tr>    
        <td colspan="3"><strong>Total</strong></td>
    <td><strong><?php echo $total_units; ?></strong></td>
    <td><strong><?php echo $total_lec_hrs; ?></strong></td>
    <td><strong><?php echo $total_lab_hrs; ?></strong></td>
     </tr>
           </table>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php
    $status_class = '';
    if ($grade_status === "Good Track") {
        $status_class = 'good-track';
    } elseif ($grade_status === "On Track") {
        $status_class = 'on-track';
    } elseif ($grade_status === "Off Track") {
        $status_class = 'off-track';
    }
?>
<div class="text">
    <h3>Status: <span class="<?php echo $status_class; ?>"><?php echo htmlspecialchars($grade_status); ?></span></h3>
</div>

    <button class="print-btn" onclick="printPage()">Print</button>

    </div>
</body>
</html>