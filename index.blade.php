@extends('layouts.app')
@section('content')
<h1>Senior Citizen Records</h1>
<a class="btn" href="{{ route('senior-citizens.create') }}">+ Add Senior Citizen</a>
<form method="GET" style="margin-top:15px"><input name="search" value="{{ $search }}" placeholder="Search OSCA ID, name, or barangay"></form>
<div class="card"><table>
<tr><th>OSCA ID</th><th>Name</th><th>Sex</th><th>Barangay</th><th>Actions</th></tr>
@forelse($seniors as $senior)
<tr><td>{{ $senior->osca_id }}</td><td>{{ $senior->full_name }}</td><td>{{ $senior->sex }}</td><td>{{ $senior->barangay }}</td>
<td><a class="btn" href="{{ route('senior-citizens.show',$senior) }}">View</a></td></tr>
@empty<tr><td colspan="5">No records found.</td></tr>@endforelse
</table></div>
{{ $seniors->links() }}
@endsection
