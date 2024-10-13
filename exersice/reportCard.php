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
                <p><strong>نام دانشجو:</strong>  ستاره عزآبادی</p>
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
                $nomre = array('زبان' => 18.50, 'فارسی' => 10, 'دینی' => 20,'ورزش'=>17);
                $units = array('زبان' => 3, 'فارسی' => 2, 'دینی' => 1,'ورزش'=>2);
                
                $totalUnits = 0; // برای جمع تعداد واحدها
                $weightedSum = 0; // برای جمع نمرات وزنی

                foreach ($nomre as $esm => $score) {
                    $unit = $units[$esm]; // تعداد واحد درس
                    echo "<tr><td>$esm</td><td>$unit</td><td>$score</td></tr>";

                    // محاسبه مجموع وزنی و تعداد واحدها
                    $totalUnits += $unit;
                    $weightedSum += $score * $unit;
                }

                $avg = $totalUnits > 0 ? $weightedSum / $totalUnits : 0;
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
