@extends('layouts.app')
@section('content')
<h1>{{ $seniorCitizen->full_name }}</h1>
<div class="card">
<p><strong>OSCA ID:</strong> {{ $seniorCitizen->osca_id }}</p>
<p><strong>Birth Date:</strong> {{ $seniorCitizen->birth_date->format('F d, Y') }}</p>
<p><strong>Sex:</strong> {{ $seniorCitizen->sex }}</p>
<p><strong>Barangay:</strong> {{ $seniorCitizen->barangay }}</p>
<p><strong>Address:</strong> {{ $seniorCitizen->address }}</p>
<p><strong>PhilHealth:</strong> {{ $seniorCitizen->philhealth ? 'Yes' : 'No' }}</p>
<p><strong>Pension:</strong> {{ $seniorCitizen->pension_status }}</p>
<a class="btn" href="{{ route('senior-citizens.edit',$seniorCitizen) }}">Edit</a>
</div>
@endsection
