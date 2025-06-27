<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PostHub - Bold Post Viewer</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  @livewireStyles

  <style>
    :root {
      --primary: #ff6b00;
      --secondary: #ffd500;
      --bg: #ffffff;
      --text: #1a1a1a;
      --lightgray: #f5f5f5;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--bg);
      color: var(--text);
      line-height: 1.6;
      padding: 1rem;
    }

    header {
      text-align: center;
      margin-bottom: 2rem;
      position: relative;
    }

    header h1 {
      font-size: 3rem;
      color: var(--primary);
    }

    .login-button {
      position: absolute;
      top: 10px;
      right: 20px;
    }

    .login-button a {
      background-color: var(--primary);
      color: white;
      text-decoration: none;
      padding: 0.5rem 1rem;
      border-radius: 6px;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .read-area {
      max-width: 900px;
      margin: auto;
      background: #fffdf6;
      border: 2px solid var(--secondary);
      border-radius: 12px;
      padding: 2rem;
    }

    .post-meta {
      color: #888;
      margin-bottom: 1rem;
    }

    .comment-section {
      margin-top: 2rem;
    }

    .comment-box-scroll {
      max-height: 400px;
      overflow-y: auto;
      padding-right: 10px;
    }

    .comment {
      background: #fff8e1;
      border-left: 4px solid var(--secondary);
      border-radius: 8px;
      padding: 1rem;
      margin-bottom: 1rem;
    }

    .reply {
      margin-left: 30px;
      background: #fff3cd;
    }

    .comment-form textarea {
      width: 100%;
      padding: 1rem;
      margin-top: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    .comment-form button {
      margin-top: 1rem;
      background-color: var(--primary);
      color: white;
      padding: 0.5rem 1rem;
      border: none;
      font-weight: bold;
      cursor: pointer;
      border-radius: 5px;
    }

    .reply-toggle {
      background-color: #ffd500;
      border: none;
      padding: 4px 10px;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 8px;
    }

    @media (max-width: 768px) {
      .read-area {
        padding: 1rem;
      }
    }
  </style>
</head>
<body>
<header>
  <h1>PostHub</h1>
  <p style="color:#666">Browse, Read & React Boldly</p>

  @guest
    <div class="login-button">
      <a href="{{ url('/login') }}">🔐 Login</a>
    </div>
  @endguest

  @auth
    <div class="login-button d-flex align-items-center gap-2">
      @if(auth()->user()->type == 1)
        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-primary me-2">🏠 Dashboard</a>
      @endif

      <form method="get" action="{{url('/logout')}}">
                            @csrf
                            <a class="" href="route('logout')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                <i class="ti-power-off">
                                {{ __('Log Out') }}</i>
                            </a>
                        </form>
    </div>
  @endauth
</header>


<div class="read-area">
  <h2></h2>
  <div class="post-meta">Published on by Admin</div>
  <p></p>

  <div class="comment-section">
    <h3>Comments</h3>
    <div class="container mt-5">
      <h2 class="mb-4 text-center" style="color:#ff6b00;">📰 All Posts</h2>
    @livewire('welcome-post')
    </div>
  </div>
</div>

<script>
  function toggleReplyForm(id) {
    const form = document.getElementById(id);
    if (form) {
      form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
  }
</script>
@livewireScripts
</body>
</html>
