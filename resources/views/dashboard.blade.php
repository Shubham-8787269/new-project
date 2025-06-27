@extends('layouts.app_view')

@section('content')

<style>
  .card-custom {
    background: rgb(195, 186, 137);
    padding: 30px 20px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
  }

  .card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
  }

  .card-custom h2 {
    font-size: 22px;
    color: #333;
    margin-bottom: 15px;
  }

  .card-custom p {
    font-size: 36px;
    font-weight: bold;
    color: #00667D;
  }

  h1, h3 {
    text-align: center;
    color: #003366;
  }

  @media (max-width: 768px) {
    .card-custom p {
      font-size: 28px;
    }

    h3 {
      font-size: 24px;
    }
  }
</style>

<div class="container py-4">
  @if(Auth::user()->type == 1)
    <!-- ✅ Admin Dashboard -->
    <h3>Admin Dashboard</h3>
    <div class="row g-4 mt-4">
      <div class="col-md-6">
        <div class="card-custom">
          <h2>Total Users</h2>
          <p>{{ \App\Models\User::count() }}</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-custom">
          <h2>Today Register</h2>
          <p>{{ $todayCount }}</p>
        </div>
      </div>
    </div>

  @else
    <!-- ✅ User Dashboard with Form -->
    <h3>Lawyer Dashboard</h3>
    <div class="row justify-content-center mt-4">
      <div class="col-md-6">
        <div class="card shadow-sm p-4">
          <h5 class="mb-3 text-center"> Details </h5>
         <div class="container mt-4">
    <div class="row g-4 align-items-start">

        <!-- ✅ Left Column: Form -->
       

        <!-- ✅ Right Column: Styled Image in Card -->
       
    </div>
</div>

        </div>
      </div>
    </div>
  @endif
</div>

@endsection
