<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Sidebar</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <style>
    body, h1, h2, h3, h4, h5 {
      font-family: "Poppins", sans-serif;
    }
    body {
      font-size: 16px;
      background-color: #f8f9fa;
      color: #333;
      filter: invert(1);
    }
    .offcanvas-body a, .offcanvas-body > div a {
      color: #495057;
      background-color: #ffffff;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 10px;
      padding: 0px;
      font-size: 18px;
      font-weight: 900;
      justify-content: center;
      align-items: center;
      height: 60px;
      text-align: center;
      text-decoration: none;
      display: flex;
      border-radius: 8px;
      transition: all 0.3s ease;
      min-width: 220px;
    }
    .offcanvas-body {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
      padding: 20px;
      margin-top: -40px;
      height: 500px;
      overflow-y: scroll;
    }
    .offcanvas-body a:hover {
      background-color: #007bff;
      color: #fff;
    }
    .offcanvas-header img {
      height: 135px;
      width: 150px;
      margin-bottom: 20px;
    }
    .offcanvas-title {
      font-size: 1.5rem;
      color: #007bff;
    }
    .offcanvas-body .container {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
      width: 100%;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
    }
    #offcanvasbottom {
      height: 540px;
    }
    .container > img {
      height: 115px;
      width: 125px;
      margin-bottom: 45px;
      margin-left: -52px;
    }
    .toggles a.active {
      background-color: #0056b3;
      color: #fff;
    }
    .main-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
    }
    .main-header > .menu > span {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .main-header > .menu > span > h1 {
      font-size: 20px;
      font-weight: 900;
      font-family: "emoji";
    }
    .main-header > .menu > span > h3 {
      font-size: 15px;
      font-weight: 600;
    }
    #admindp {
      height: 80px;
      width: 80px;
      border-radius: 50%;
    }
    .main-header > .menu {
      display: flex;
      justify-content: end;
      gap: 10px;
    }
    .logout-btn {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .logout-btn:hover {
      background-color: #0056b3;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
      .main-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }
      .main-header > .menu {
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
        padding: 0 10px;
      }
      .offcanvas-body a, .offcanvas-body > div a {
        font-size: 16px;
        height: 50px;
        min-width: 180px;
      }
    }

    @media (max-width: 576px) {
      .offcanvas-body a, .offcanvas-body > div a {
        font-size: 14px;
        height: 40px;
        min-width: 150px;
      }
      .main-header > .menu > span > h1 {
        font-size: 18px;
      }
      .main-header > .menu > span > h3 {
        font-size: 13px;
      }
    }
  </style>
</head>
<body>
<div class="main-header">
  <div>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"> MENU </button>
  </div>
  <div class="menu">
    <span>
      <h1>Admin</h1>
      <h3>MANAGER</h3>
    </span>
    <img src="images/logo.jpg" alt="" id="admindp">
  </div>
</div>
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" style="height: 540px;">
  <div class="offcanvas-header">
    <div class="container">
      <img src="images/logo.jpg" alt="Company Logo">
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <a href="/dashboard">DASHBOARD</a>
    <a href="/customer-list">CUSTOMER LIST</a>
    <a href="/order-list">ORDER LIST</a>
    <a href="/website">WEBSITE</a>
    <a href="/show-products">PRODUCTS</a>
    <a href="/show-deals">PACKS & DEALS</a>
    <a href="/show-contact">Contacts</a>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>
</div>

@yield('admincomponents')

<footer class="text-center py-4">
  <p class="mb-0">© 2024 Your Company. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
