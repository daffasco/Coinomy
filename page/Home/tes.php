<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Crypto Class Cards</title>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      background-color: #2e2540;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 24px;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
        sans-serif;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 32px;
      max-width: 960px;
      width: 100%;
    }

    .card {
      background-color: #3a2e5a;
      border-radius: 8px;
      width: 192px;
      position: relative;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
      display: block;
    }

    .like-icon {
      position: absolute;
      top: 8px;
      right: 8px;
      background-color: #6a2edb;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 18px;
      cursor: pointer;
      user-select: none;
    }

    .card-footer {
      background-color: #6a2edb;
      color: white;
      font-weight: 700;
      font-size: 12px;
      padding: 8px 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom-left-radius: 8px;
      border-bottom-right-radius: 8px;
    }

    .price {
      background-color: #4a1dbb;
      border-radius: 6px;
      padding: 2px 8px;
      font-weight: 600;
      font-size: 12px;
      white-space: nowrap;
    }

    @media (max-width: 640px) {
      .container {
        gap: 16px;
      }

      .card {
        width: 140px;
      }

      .card img {
        height: 110px;
      }

      .like-icon {
        width: 28px;
        height: 28px;
        font-size: 16px;
      }

      .card-footer {
        font-size: 10px;
        padding: 6px 8px;
      }

      .price {
        font-size: 10px;
        padding: 1px 6px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <img
        src="https://storage.googleapis.com/a1aa/image/bb0d2f51-fe6b-4594-08ff-0b0f3308112d.jpg"
        alt="Man in gray suit holding a laptop with white background"
        width="150"
        height="150" />
      <div class="like-icon">
        <i class="fas fa-thumbs-up"></i>
      </div>
      <div class="card-footer">
        <span>Crypto Class</span>
        <span class="price">150K IDR</span>
      </div>
    </div>
    <div class="card">
      <img
        src="https://storage.googleapis.com/a1aa/image/bb0d2f51-fe6b-4594-08ff-0b0f3308112d.jpg"
        alt="Man in gray suit holding a laptop with white background"
        width="150"
        height="150" />
      <div class="like-icon">
        <i class="fas fa-thumbs-up"></i>
      </div>
      <div class="card-footer">
        <span>Crypto Class</span>
        <span class="price">150K IDR</span>
      </div>
    </div>
    <div class="card">
      <img
        src="https://storage.googleapis.com/a1aa/image/bb0d2f51-fe6b-4594-08ff-0b0f3308112d.jpg"
        alt="Man in gray suit holding a laptop with white background"
        width="150"
        height="150" />
      <div class="like-icon">
        <i class="fas fa-thumbs-up"></i>
      </div>
      <div class="card-footer">
        <span>Crypto Class</span>
        <span class="price">150K IDR</span>
      </div>
    </div>
  </div>
</body>

</html>