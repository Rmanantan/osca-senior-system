@extends('layouts.app')
@section('content')
<h1>Senior Citizen Report</h1>
<button onclick="window.print()">Print Report</button>
<div class="card"><table><tr><th>OSCA ID</th><th>Name</th><th>Sex</th><th>Barangay</th><th>PhilHealth</th><th>Pension</th></tr>
@foreach($seniors as $s)<tr><td>{{ $s->osca_id }}</td><td>{{ $s->full_name }}</td><td>{{ $s->sex }}</td><td>{{ $s->barangay }}</td><td>{{ $s->philhealth ? 'Yes':'No' }}</td><td>{{ $s->pension_status }}</td></tr>@endforeach
</table></div>
@endsection
