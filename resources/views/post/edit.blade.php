@extends('layouts.app_view')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .form-container {
      max-width: 600px;
      margin: 50px auto;
      background: #fff;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .form-title {
      margin-bottom: 25px;
      font-weight: bold;
      color: #333;
    }

    .btn-primary {
      background-color: #ff6b00;
      border: none;
    }

    .btn-primary:hover {
      background-color: #e65c00;
    }

    .post-table {
      max-width: 1000px;
      margin: 40px auto;
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2 class="form-title text-center">Create New Post</h2>
    <form method="POST" action="{{url('/update/post/'.$data->id)}}" enctype="multipart/form-data">
      @csrf

      <!-- Image Upload -->
      <div class="mb-3">
  <label for="image" class="form-label">Post Image</label>
  <input class="form-control" type="file" name="image" id="image" accept="image/*">

  @if($data->image)
    <div class="mt-2">
      <p>Current Image:</p>
      <img src="{{ asset('storage/' . $data->image) }}" alt="Current Image" width="150" class="img-thumbnail">
    </div>
  @endif
</div>

      <!-- Title -->
      <div class="mb-3">
        <label for="title" class="form-label">Post Title</label>
        <input type="text" class="form-control" value="{{$data->title}}" name="title" id="title" placeholder="Enter post title" required>
      </div>

      <!-- Content -->
      <div class="mb-3">
        <label for="content" class="form-label">Post Content</label>
        <textarea class="form-control" name="content"value="{{$data->content}}" id="content" rows="5" placeholder="Write your content here..." required>{{$data->content}}</textarea>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn btn-primary w-100">Submit Post</button>
    </form>
  </div>

  <!-- 📝 Table to display existing posts -->
  <div class="post-table">
    <h4 class="mb-4 text-center">📋 Existing Posts</h4>

    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Post Title</th>
          <th scope="col">Post Content</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>
        @foreach($posts as $index => $post)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>
              @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100" class="img-thumbnail">
              @else
                <em>No Image</em>
              @endif
            </td>
            <td>{{ $post->title }}</td>
            <td>{{ Str::limit($post->content, 80) }}</td>
             <td class="text-center">
                    <a href="{{url('/edit/post/'.$post->id)}}" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                    <a href="{{url('/delete/post/'.$post->id)}}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>
@endsection
