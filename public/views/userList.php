<?php include '../php/userList.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>لیست کاربران</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .titleWrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="titleWrapper">
            <h2>لیست کاربران</h2>
            <svg width="260" height="2" viewBox="0 0 260 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M259.5 1H0" stroke="url(#paint0_linear)" />
                <defs>
                    <linearGradient id="paint0_linear" x1="260" y1="1.99734" x2="0" y2="1.99734" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3C8023" />
                        <stop offset="1" stop-color="#3C8023" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
        </div>

        <!-- User List Table -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ایدی</th>
                    <th>نام کاربری</th>
                    <th>ایمیل</th>
                    <th>شماره تلفن</th>
                    <th> آدرس</th>
                    <th>نقش</th>
                    <th> عملیات</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to display users -->
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo ($user['id']); ?></td>
                            <td><?php echo ($user['username']); ?></td>
                            <td><?php echo ($user['email']); ?></td>
                            <td><?php echo ($user['phone']); ?></td>
                            <td><?php echo ($user['address']); ?></td>
                            <?php if($user['role']===1): ?>
                                <td><?php echo 'ادمین';?></td>
                            <?php else: ?>
                                <td><?php echo 'کاربر';?></td>
                                <?php endif; ?>
                            <td>
                           
                            <a href="../php/deleteUser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">حذف</a>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">هیچ کاربری برای نمایش وجود ندارد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
