<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>کارنامه تحصیلی</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./reportCard.css" />
</head>
<body>
    <div class="report-card">
        <!-- Header Section -->
        <div class="header">
            <i class="fas fa-graduation-cap icon"></i>
            <h1>کارنامه تحصیلی</h1>
            <div class="header-info">
                <p><strong>نام دانشجو:</strong> ستاره عزآبادی</p>
                <p><strong>شماره دانشجویی:</strong> ۹۸۱۲۳۴۵۶۷</p>
            </div>
            <div class="header-info">
                <p><strong>ترم:</strong> پنجم</p>
                <p><strong>تعداد واحد:</strong> 17</p>
            </div>
        </div>

        <!-- Courses Table -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>نام درس</th>
                    <th>تعداد واحد</th>
                    <th>نمره</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $courses = [
                    ['name' => 'زبان', 'units' => 3, 'score' => 18.50],
                    ['name' => 'فارسی', 'units' => 2, 'score' => 10],
                    ['name' => 'دینی', 'units' => 1, 'score' => 20],
                    ['name' => 'ورزش', 'units' => 2, 'score' => 17],
                ];

                $totalUnits = 0; 
                $weightedSum = 0; 

                foreach ($courses as $course) {
                    echo "<tr>
                            <td>{$course['name']}</td>
                            <td>{$course['units']}</td>
                            <td>{$course['score']}</td>
                          </tr>";

                    $totalUnits += $course['units'];
                    $weightedSum += $course['score'] * $course['units'];
                }

                $avg = ($totalUnits > 0) ? $weightedSum / $totalUnits : 0;
                ?>
            </tbody>
        </table>

        <!-- Footer Section -->
        <div class="footer">
            <p><strong>میانگین نمرات:</strong> <?php echo number_format($avg, 2); ?></p>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
