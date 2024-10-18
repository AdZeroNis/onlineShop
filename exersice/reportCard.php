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
                <p><strong>شماره دانشجویی:</strong> 00131119907018</p>
            </div>
            <div class="header-info">
                <p><strong>ترم:</strong> ششم</p>
                <p><strong>تعداد واحد:</strong> 17</p>
            </div>
            <div class="header-info">
                <p><strong>تاریخ تولد:</strong>1381/03/17</p>
                <p><strong>محل تولد:</strong> گرگان</p>
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
                    ['name' => 'آزمایشگاه سیستم عامل 2', 'units' => 3, 'score' => 19.50],
                    ['name' => 'آزمایشگاه مهندسی نرم افزار', 'units' => 2, 'score' => 19.5],
                    ['name' => 'امنیت شبکه های کامپوتری', 'units' => 1, 'score' => 15],
                    ['name' => 'برنامه نویسی موبایل', 'units' => 2, 'score' => 19],
                    ['name' => 'تحلیل و طراحی سیستم', 'units' => 2, 'score' => 17],
                    ['name' => 'طراحی صفحات وب پیشرفته', 'units' => 2, 'score' => 19],
                    ['name' => 'هوش مصنوعی', 'units' => 2, 'score' => 11],
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

                if ($totalUnits > 0) {
                    $avg = $weightedSum / $totalUnits;
                } else {
                    $avg = 0;
                }
                
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
