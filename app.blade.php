<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'OSCA Senior System' }}</title>
    <style>
        body{font-family:Arial,sans-serif;margin:0;background:#f4f6f8;color:#222}
        nav{background:#17365d;color:#fff;padding:14px 20px;display:flex;gap:16px;align-items:center;flex-wrap:wrap}
        nav a{color:#fff;text-decoration:none}.container{max-width:1100px;margin:25px auto;padding:0 16px}
        .card{background:#fff;border-radius:8px;padding:18px;margin-bottom:18px;box-shadow:0 1px 5px #0001}
        table{width:100%;border-collapse:collapse;background:#fff}th,td{padding:10px;border-bottom:1px solid #ddd;text-align:left}
        input,select,textarea{width:100%;padding:9px;box-sizing:border-box;margin:5px 0 12px}
        button,.btn{background:#17365d;color:#fff;border:0;padding:9px 14px;border-radius:5px;text-decoration:none;cursor:pointer}
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:15px}
        .stat{font-size:26px;font-weight:bold}.success{background:#dff5e3;padding:10px;border-radius:5px}
        .danger{background:#f8d7da;padding:10px;border-radius:5px}
    </style>
</head>
<body>
<nav>
    <strong>OSCA Senior System</strong>
    @auth
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('senior-citizens.index') }}">Senior Citizens</a>
        <a href="{{ route('benefits.index') }}">Benefits</a>
        <a href="{{ route('qr.index') }}">QR Verification</a>
        <a href="{{ route('reports.seniors') }}">Reports</a>
        <span style="margin-left:auto">{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">@csrf<button>Logout</button></form>
    @endauth
</nav>
<div class="container">
    @if(session('success'))<div class="success">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="danger"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    @yield('content')
</div>
</body>
</html>
