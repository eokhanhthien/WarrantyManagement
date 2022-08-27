<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('frontend/css/admin/style.css')}}">
    <title>Đăng nhập ADMIN</title>
</head>
<body>

<div class="login-admin">
<div class="container right-panel-active">
  <!-- Sign Up -->
  <div class="container__form container--signup">
    <form action="#" class="form" id="form1">
      <h2 class="form__title">Quên mật khấu</h2>

      <!-- <input type="text" placeholder="User" class="input" />
      <input type="email" placeholder="Email" class="input" />
      <input type="password" placeholder="Password" class="input" />
      <button class="btn">Sign Up</button> -->
      <p>Hãy liên hệ hotline của chúng tôi 0946144xxx để được hướng dẫn cụ thể</p>
      @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif
    </form>
  </div>

  <!-- Sign In -->
  <div class="container__form container--signin">
  <form action="{{route('checklogin')}}" method="POST" >
    @csrf
    <div  class="form" id="form2" >
      <h2 class="form__title">Đăng nhập</h2>
      <input name='email' type="email" placeholder="Email" class="input" />
      <input name="password" type="password" placeholder="Password" class="input" />
      <!-- <a href="#" class="link">Forgot your password?</a> -->
      <button type="submit" class="btn">Đăng nhập</button>
  </div>
</form>
  </div>

  <!-- Overlay -->
  <div class="container__overlay">
    <div class="overlay">
      <div class="overlay__panel overlay--left">
        <button class="btn" id="signIn">Đăng nhập</button>
      </div>
      <div class="overlay__panel overlay--right">
        <button class="btn" id="signUp">Quên mật khấu</button>
      </div>
    </div>
  </div>
</div></div>

  <script src="{{asset('frontend/js/admin.js')}}"></script>
</body>
</html>