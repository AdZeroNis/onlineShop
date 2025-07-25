<!DOCTYPE html>
<html lang="fa">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>افزودن محصول</title>
    <style>
      body {
        font-family: "IranSans";
      }
      .form-container {
        max-width: 800px;
        margin: 30px auto;
        padding: 20px;
      }

      .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
      }

      .form-group {
        display: flex;
        flex-direction: column;
      }

      label {
        font-weight: bold;
        margin-bottom: 8px;
        color: #333;
      }

      input,
      select,
      textarea {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        transition: all 0.3s ease;
      }

      input:focus,
      select:focus,
      textarea:focus {
        border-color: #0f155c;
        outline: none;
        box-shadow: 0 0 5px rgba(60, 128, 35, 0.3);
      }

      textarea {
        resize: none;
      }

      .form-actions {
        grid-column: span 2;
        text-align: center;
        margin-top: 20px;
      }

      button {
        padding: 12px 20px;
        background-color: #0f155c;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
      }

      button:hover {
        background-color: #333978;
      }

      svg {
        margin-top: 5px;
      }
    </style>
  </head>
  <body>
    <div>
      <div class="titleWrapper">
        <h2>افزودن محصول</h2>
        <svg
          width="260"
          height="2"
          viewBox="0 0 260 2"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M259.5 1H0" stroke="url(#paint0_linear)" />
          <defs>
            <linearGradient
              id="paint0_linear"
              x1="260"
              y1="1.99734"
              x2="0"
              y2="1.99734"
              gradientUnits="userSpaceOnUse"
            >
              <stop stop-color="#0f155c" />
              <stop offset="1" stop-color="#0f155c" stop-opacity="0" />
            </linearGradient>
          </defs>
        </svg>
      </div>
      <div class="form-container">
        <form
          action="../php/products.php"
          method="post"
          enctype="multipart/form-data"
        >
          <div class="form-grid">
            <div class="form-group">
              <label for="productName">نام محصول:</label>
              <input type="text" id="productName" name="productName" required />
            </div>

            <div class="form-group">
              <label for="price">قیمت (تومان):</label>
              <input type="number" id="price" name="price" required />
            </div>

            <div class="form-group">
              <label for="size">اندازه:</label>
              <select id="size" name="size" required>
                <option value="small">کوچک</option>
                <option value="medium">متوسط</option>
                <option value="large">بزرگ</option>
              </select>
            </div>

            <div class="form-group">
              <label for="color">رنگ:</label>
              <input type="text" id="color" name="color" required />
            </div>

            <div class="form-group">
              <label for="stock">تعداد :</label>
              <input type="number" id="stock" name="stock" required />
            </div>

            <div class="form-group">
              <label for="image">آپلود تصویر:</label>
              <input
                type="file"
                id="image"
                name="image"
                accept="image/*"
                required
              />
            </div>

            <div class="form-group">
              <label for="description">توضیحات:</label>
              <textarea
                id="description"
                name="description"
                rows="4"
                placeholder="توضیحات محصول را وارد کنید..."
                required
              ></textarea>
            </div>
          </div>

          <div class="form-actions">
            <button type="submit">ارسال</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
