<?php
include '../php/profile.php';

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Profile Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css" />
  <style>
    .parent {
      font-family: IranSans;
      background-color: #f7f7f7;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .intoParent {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 40px;
      width: 100%;
      max-width: 600px;
    }

    .titleWrapper {
      text-align: center;
      margin-bottom: 20px;
    }

    h2 {
      font-size: 24px;
      color: #333;
    }

    .titleWrapper svg {
      margin-top: 10px;
      width: 80px;
      height: 2px;
    }

    .form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      align-items: center;
      width: 100%;
    }

    label {
      font-size: 16px;
      color: #333;
      margin-bottom: 5px;
      width: 100%;
    }

    input {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 5px;
      outline: none;
      transition: border-color 0.3s ease;
      width: 100%;
      display: flex;
      text-align: right;
    }

    input:focus {
      border-color: #4CAF50;
    }

    button {
      padding: 12px;
      font-size: 16px;
      background-color: #ffc107;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #45a049;
    }

    footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px 0;
    }

    /* Media Query for Mobile */
    @media (max-width: 768px) {
      .container {
        padding: 20px;
      }

      h2 {
        font-size: 20px;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  <?php include './header.php'; ?>

  <div class="parent">
    <div class="container intoParent">
      <div class="titleWrapper">
        <h2>پروفایل</h2>
        <svg
          width="260"
          height="2"
          viewBox="0 0 260 2"
          fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M259.5 1H0" stroke="url(#paint0_linear)" />
          <defs>
            <linearGradient
              id="paint0_linear"
              x1="260"
              y1="1.99734"
              x2="0"
              y2="1.99734"
              gradientUnits="userSpaceOnUse">
              <stop stop-color="#3C8023" />
              <stop offset="1" stop-color="#3C8023" stop-opacity="0" />
            </linearGradient>
          </defs>
        </svg>
      </div>

      <form class="form" action="" method="post">
        <label for="username">نام کاربری:</label>
        <input type="text" id="username" name="username" value="<?php echo ($users['username']); ?>" required />

        <label for="email">ایمیل:</label>
        <input type="email" id="email" name="email" value="<?php echo ($users['email']); ?>" required />

        <label for="phone">تلفن:</label>
        <input type="text" id="phone" name="phone" value="<?php echo ($users['phone']); ?>" required />

        <label for="password">رمز عبور جدید:</label>
        <input type="password" id="password" name="password" />

        <button type="submit" name="edit_profile">ویرایش پروفایل</button>
        <a href="../php/logout.php">خروج از حساب</a>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <?php include './footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>