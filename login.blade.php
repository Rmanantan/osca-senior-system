<!doctype html>
<html><head><meta name="viewport" content="width=device-width,initial-scale=1"><title>OSCA Login</title>
<style>body{font-family:Arial;background:#f4f6f8}.box{max-width:400px;margin:70px auto;background:white;padding:25px;border-radius:8px}input{width:100%;padding:10px;margin:8px 0 15px;box-sizing:border-box}button{padding:10px 18px;background:#17365d;color:white;border:0;border-radius:5px;width:100%}</style></head>
<body><div class="box"><h1>OSCA Senior System</h1><h3>Login</h3>
@if($errors->any())<p style="color:red">{{ $errors->first() }}</p>@endif
<form method="POST" action="{{ route('login.store') }}">@csrf
<label>Email</label><input type="email" name="email" required>
<label>Password</label><input type="password" name="password" required>
<button>Login</button></form>
<p>Demo: admin@osca.test / password</p></div></body></html>
