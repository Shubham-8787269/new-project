<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #6a11cb, #2575fc);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .register-card {
      background-color: #fff;
      border-radius: 15px;
      padding: 40px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
    }

    .register-card h2 {
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
      color: #333;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #2575fc;
    }

    .btn-custom {
      background-color: #2575fc;
      color: #fff;
      font-weight: 600;
    }

    .btn-custom:hover {
      background-color: #1a5be0;
    }
  </style>
</head>
<body>

<div class="register-card">
  <h2>Login Account</h2>
  <form action="{{url('/login/store')}}" method="POST">
  @csrf

    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Choose a password" required>
    </div>

    <button type="submit" class="btn btn-custom w-100">Login</button>
  </form>
  <a href="/register">Already have not Account</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
