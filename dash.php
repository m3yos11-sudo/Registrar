<?php
session_start();
if (!isset($_SESSION["is_authenticated"]) || $_SESSION["is_authenticated"] !== true) {
    header("Location: ./");
    exit;
}

if (isset($_POST['success']) && $_POST['success'] == true) {
    echo "<script>alert('Backup Successful: <strong>$back_up</strong>!');</script>";
}

$conn = new mysqli("localhost", "root", "", "cdsldb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT course_init, year_name,
            SUM(CASE WHEN year_name = '1st Year' AND gender = 'Male' THEN 1 ELSE 0 END) AS first_year_male,
            SUM(CASE WHEN year_name = '1st Year' AND gender = 'Female' THEN 1 ELSE 0 END) AS first_year_female,
            SUM(CASE WHEN year_name = '2nd Year' AND gender = 'Male' THEN 1 ELSE 0 END) AS second_year_male,
            SUM(CASE WHEN year_name = '2nd Year' AND gender = 'Female' THEN 1 ELSE 0 END) AS second_year_female,
            SUM(CASE WHEN year_name = '3rd Year' AND gender = 'Male' THEN 1 ELSE 0 END) AS third_year_male,
            SUM(CASE WHEN year_name = '3rd Year' AND gender = 'Female' THEN 1 ELSE 0 END) AS third_year_female,
            SUM(CASE WHEN year_name = '4th Year' AND gender = 'Male' THEN 1 ELSE 0 END) AS fourth_year_male,
            SUM(CASE WHEN year_name = '4th Year' AND gender = 'Female' THEN 1 ELSE 0 END) AS fourth_year_female,


            COUNT(*) AS total_students

            
            

        FROM student_infoo  
        JOIN student_course ON student_infoo.course_id = student_course.course_id 
        JOIN student_year ON student_infoo.year_id = student_year.year_id 
        GROUP BY course_init
        ORDER BY course_init";

$result = $conn->query($sql);
$data = [];
$courses = [];

while ($row = $result->fetch_assoc()) {
    $data[] = [
        'course' => $row["course_init"],
        'first_year_male' => (int)$row["first_year_male"],
        'first_year_female' => (int)$row["first_year_female"],
        'second_year_male' => (int)$row["second_year_male"],
        'second_year_female' => (int)$row["second_year_female"],
        'third_year_male' => (int)$row["third_year_male"],
        'third_year_female' => (int)$row["third_year_female"],
        'fourth_year_male' => (int)$row["fourth_year_male"],
        'fourth_year_female' => (int)$row["fourth_year_female"],
        'total_students' => (int)$row["total_students"]
    ];
    $courses[] = $row["course_init"];
}

$uniqueCourses = array_unique($courses);
$selectedCourseData = $data[0];
$selectedCourseDatab = $data[1];
$selectedCourseDatae = $data[2];
$selectedCourseDatah = $data[3];
echo '<script>var studentData = ' . json_encode([$selectedCourseData]) . ';</script>';
echo '<script>var studentData = ' . json_encode([$selectedCourseDatab]) . ';</script>';
echo '<script>var studentData = ' . json_encode([$selectedCourseDatae]) . ';</script>';
echo '<script>var studentData = ' . json_encode([$selectedCourseDatah]) . ';</script>';

echo '<script>var studentData = ' . json_encode($data) . ';</script>';
echo '<script>var courseList = ' . json_encode(array_values($uniqueCourses)) . ';</script>';

$enrollData = [];
$sqlyear = "SELECT school_year AS enroll_year, COUNT(*) AS total_students
FROM student_infoo
GROUP BY school_year
ORDER BY school_year";

$result = $conn->query($sqlyear);
while ($row = $result->fetch_assoc()) {
    $enrollData[] = [
        'year' => $row['enroll_year'],
        'total' => (int)$row['total_students']
    ];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Gender Distribution</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                    <a href="dash.php" class="nav_link active">
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
                    <a href="student_section.php" class="nav_link">
                    <i class="bi bi-people-fill"></i>
                        <span class="nav_name">Student Section</span>
                    </a>
                    <a href="./student_add/register_step1.php" class="nav_link">
                    <i class="bi bi-person-plus-fill " ></i>
                        <span class="nav_name">Add Student</span>
                    </a>
                    <a href="./add_grades/index.php" class="nav_link">
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
    <div class="height-100 bg-light">
            <div class="card-header bg-warning fw-bold text-center my-0">
                    <h3 class="text-uppercase fw-bold ">Dashboard</h3>
                </div>
                <div class="dashboard">
                    <div id="courseButtons">
                        <div class="row">
                    <div class="col-3">
    <button data-course="BSCRIM">
        <div class="carddash">
            <div class="d-flex align-items-center mb-3"> 
            <i class="bi bi-shield-lock" style="font-size: 30px; margin-right: 10px;"></i> 
                <h3 class="mb-0"><?php echo $selectedCourseData['course']; ?></h3> 
            </div>
            <p>Total male and female</p>
            <div class="count"><?php echo $selectedCourseData['total_students']; ?></div>
        </div>
    </button>
</div>
      <div class="col-3">
    <button data-course="BSEnt">
        <div class="carddash">
            <div class="d-flex align-items-center mb-3"> 
                <i class="bi bi-briefcase" style="font-size: 30px; margin-right: 10px;"></i> 
                <h3 class="mb-0"><?php echo $selectedCourseDatab['course']; ?></h3> 
            </div>
            <p>Total male and female</p>
            <div class="count"><?php echo $selectedCourseDatab['total_students']; ?></div>
        </div>
    </button>
</div>
<div class="col-3">
    <button data-course="BSPsy">
        <div class="carddash">
            <div class="d-flex align-items-center mb-3"> 
                <i class="bi bi-person-heart " style="font-size: 30px; margin-right: 10px;"></i> 
                <h3 class="mb-0"><?php echo $selectedCourseDatae['course']; ?></h3> 
            </div>
            <p>Total male and female</p>
            <div class="count"><?php echo $selectedCourseDatae['total_students']; ?></div>
        </div>
    </button>
</div>
<div class="col-3">
    <button data-course="BSTM">
        <div class="carddash">
            <div class="d-flex align-items-center mb-3"> 
                <i class="bi bi-airplane-engines" style="font-size: 30px; margin-right: 10px;"></i> 
                <h3 class="mb-0"><?php echo $selectedCourseDatah['course']; ?></h3> 
            </div>
            <p>Total male and female</p>
            <div class="count"><?php echo $selectedCourseDatah['total_students']; ?></div>
        </div>
    </button>
</div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-8">
                    <canvas id="myChart" width="1000" height="500"></canvas>
                    </div>
                
                <div class="col-4 mt-2 text-center">
                <canvas id="enrollChart" width="800" height="400"></canvas>
                <br>

                <a href="backup/backup.php">
                <button class="btn btn-sm btn-success text-center">Back Up</button></a>
                </div>
                </div>
            </div>

            <script>
                let ctx = document.getElementById('myChart').getContext('2d');
                let studentChart;

                function renderChart(filteredData) {
                    const labels = filteredData.map(data => data.course);
                    const firstYearMale = filteredData.map(data => data.first_year_male);
                    const firstYearFemale = filteredData.map(data => data.first_year_female);
                    const secondYearMale = filteredData.map(data => data.second_year_male);
                    const secondYearFemale = filteredData.map(data => data.second_year_female);
                    const thirdYearMale = filteredData.map(data => data.third_year_male);
                    const thirdYearFemale = filteredData.map(data => data.third_year_female);
                    const fourthYearMale = filteredData.map(data => data.fourth_year_male);
                    const fourthYearFemale = filteredData.map(data => data.fourth_year_female);

                    if (studentChart) studentChart.destroy(); // Clear previous

                    studentChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: '1st Year Male',
                                    data: firstYearMale,
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                                },
                                {
                                    label: '1st Year Female',
                                    data: firstYearFemale,
                                    backgroundColor: 'rgba(255, 99, 132, 0.5)'
                                },
                                {
                                    label: '2nd Year Male',
                                    data: secondYearMale,
                                    backgroundColor: 'rgba(54, 235, 160, 0.5)'
                                },
                                {
                                    label: '2nd Year Female',
                                    data: secondYearFemale,
                                    backgroundColor: 'rgba(255, 135, 99, 0.5)'
                                },
                                {
                                    label: '3rd Year Male',
                                    data: thirdYearMale,
                                    backgroundColor: 'rgba(54, 235, 108, 0.5)'
                                },
                                {
                                    label: '3rd Year Female',
                                    data: thirdYearFemale,
                                    backgroundColor: 'rgba(255, 99, 132, 0.5)'
                                },
                                {
                                    label: '4th Year Male',
                                    data: fourthYearMale,
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                                },
                                {
                                    label: '4th Year Female',
                                    data: fourthYearFemale,
                                    backgroundColor: 'rgba(255, 99, 132, 0.5)'
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            indexAxis: 'x',
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                stepSize: 1,       // Force whole number steps
                precision: 0       // Remove decimal places
            }
                                }
                            }
                        }
                    });
                }

                // Initial render
                renderChart(studentData);

                // Filter on course change
                document.querySelectorAll('#courseButtons button').forEach(button => {
                    button.addEventListener('click', function() {
                        const selectedCourse = this.getAttribute('data-course');
                        const filteredData = studentData.filter(data => data.course === selectedCourse);
                        renderChart(filteredData);
                    });
                });

                const enrollData = <?php echo json_encode($enrollData); ?>;

const yearLabels = [2021, 2022, 2023, 2024,2025];
const yearCounts = yearLabels.map(year => {
    const match = enrollData.find(item => item.year == year);
    return match ? match.total : 0;
});

const ctxEnroll = document.getElementById("enrollChart").getContext("2d");

new Chart(ctxEnroll, {
    type: "line",
    data: {
        labels: yearLabels,
        datasets: [{
            label: "Enrolled Students",
            data: yearCounts,
            borderColor: "rgba(54, 162, 235, 1)",
            backgroundColor: "rgba(54, 162, 235, 0.2)",
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: "Yearly Student Enrollment"
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: "Year"
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: "Number of Students"
                }
            }
        }
    }
});
</script>


</body>

</html>