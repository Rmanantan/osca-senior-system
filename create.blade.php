@extends('layouts.app')
@section('content')
<h1>Register Senior Citizen</h1>
<div class="card"><form method="POST" action="{{ route('senior-citizens.store') }}">@csrf
@include('senior-citizens.form')
<button>Save Record</button></form></div>
@endsection
