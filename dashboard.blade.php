@extends('layouts.app')
@section('content')
<h1>Dashboard</h1>
<div class="grid">
<div class="card"><div>Total Senior Citizens</div><div class="stat">{{ $total }}</div></div>
<div class="card"><div>Male</div><div class="stat">{{ $male }}</div></div>
<div class="card"><div>Female</div><div class="stat">{{ $female }}</div></div>
<div class="card"><div>PhilHealth</div><div class="stat">{{ $philhealth }}</div></div>
<div class="card"><div>Benefit Transactions</div><div class="stat">{{ $benefits }}</div></div>
</div>
<div class="card"><h2>Senior Citizens by Barangay</h2>
<table><tr><th>Barangay</th><th>Total</th></tr>
@foreach($byBarangay as $row)<tr><td>{{ $row->barangay }}</td><td>{{ $row->total }}</td></tr>@endforeach
</table></div>
@endsection
