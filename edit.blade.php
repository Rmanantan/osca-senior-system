@extends('layouts.app')
@section('content')
<h1>Edit Senior Citizen</h1>
<div class="card"><form method="POST" action="{{ route('senior-citizens.update',$seniorCitizen) }}">@csrf @method('PUT')
@include('senior-citizens.form')
<button>Update Record</button></form></div>
@endsection
