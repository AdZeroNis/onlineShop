<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کارنامه تحصیلی</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">فرم ورود اطلاعات</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="studentName" class="form-label">نام دانشجو:</label>
                <input type="text" class="form-control" id="studentName" name="studentName" required>
            </div>
            <div class="mb-3">
                <label for="studentId" class="form-label">شماره دانشجویی:</label>
                <input type="text" class="form-control" id="studentId" name="studentId" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">ترم:</label>
                <input type="text" class="form-control" id="semester" name="semester" required>
            </div>

            <h2>اطلاعات دروس</h2>
            <div id="courses">
                <div class="course mb-3">
                    <label for="courseName1" class="form-label">نام درس:</label>
                    <input type="text" class="form-control" id="courseName1" name="courseName[]" required>
                    <label for="courseTeacher1" class="form-label">نام استاد:</label>
                    <input type="text" class="form-control" id="courseTeacher1" name="courseTeacher[]" required>
                    <label for="courseCredits1" class="form-label">تعداد واحد:</label>
                    <input type="number" class="form-control" id="courseCredits1" name="courseCredits[]" required>
                    <label for="courseGrade1" class="form-label">نمره:</label>
                    <input type="number" class="form-control" id="courseGrade1" name="courseGrade[]" required>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="addCourse">افزودن درس</button>

            <button type="submit" class="btn btn-primary mt-3">محاسبه معدل</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $studentName = $_POST['studentName'];
            $studentId = $_POST['studentId'];
            $semester = $_POST['semester'];
            $courseNames = $_POST['courseName'];
            $courseTeachers = $_POST['courseTeacher'];
            $courseCredits = $_POST['courseCredits'];
            $courseGrades = $_POST['courseGrade'];

            $totalCredits = 0;
            $weightedGrades = 0;

            for ($i = 0; $i < count($courseNames); $i++) {
                $credits = $courseCredits[$i];
                $grade = $courseGrades[$i];

                $totalCredits += $credits;
                $weightedGrades += $grade * $credits;
            }

            $average = $totalCredits > 0 ? $weightedGrades / $totalCredits : 0;

            echo "<div class='mt-5'>";
            echo "<h2>کارنامه تحصیلی</h2>";
            echo "<p><strong>نام دانشجو:</strong> $studentName</p>";
            echo "<p><strong>شماره دانشجویی:</strong> $studentId</p>";
            echo "<p><strong>ترم:</strong> $semester</p>";
            echo "<p><strong>جمع کل نمرات:</strong> $weightedGrades</p>";
            echo "<p><strong>معدل:</strong> " . round($average, 2) . "</p>";
            echo "</div>";
        }
        ?>
    </div>

    <script>
        document.getElementById('addCourse').addEventListener('click', function() {
            const coursesDiv = document.getElementById('courses');
            const index = coursesDiv.children.length + 1;
            const newCourse = `
                <div class="course mb-3">
                    <label for="courseName${index}" class="form-label">نام درس:</label>
                    <input type="text" class="form-control" id="courseName${index}" name="courseName[]" required>
                    <label for="courseTeacher${index}" class="form-label">نام استاد:</label>
                    <input type="text" class="form-control" id="courseTeacher${index}" name="courseTeacher[]" required>
                    <label for="courseCredits${index}" class="form-label">تعداد واحد:</label>
                    <input type="number" class="form-control" id="courseCredits${index}" name="courseCredits[]" required>
                    <label for="courseGrade${index}" class="form-label">نمره:</label>
                    <input type="number" class="form-control" id="courseGrade${index}" name="courseGrade[]" required>
                </div>
            `;
            coursesDiv.insertAdjacentHTML('beforeend', newCourse);
        });
    </script>
</body>
</html>
