<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .profile-card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 30px;
      max-width: 500px;
      margin: 0 auto;
      margin-top: 100px;
    }
    .profile-info {
      text-align: center;
      margin-bottom: 30px;
    }
    .profile-info h2 {
      font-weight: bold;
      color: #333;
    }
    .profile-info p {
      color: #666;
      font-size: 16px;
    }
    .btn-orders {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 20px;
      transition: background-color 0.3s ease;
    }
    .btn-orders:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="profile-card">
      <div class="profile-info">
        <h4><?php echo Session::getUser()->getUsername() ?></h4>
        <p><?php echo Session::getUser()->getEmail() ?></p>
        <p><?php echo Session::getUser()->getPhone() ?></p>
      </div>
      <div class="text-center">
        <a href="orders.php" class="btn btn-orders">View Orders</a>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>