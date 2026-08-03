@extends('layouts.app')

@section('title','Edit Profil')

@section('content')

<div class="container py-5">

<div class="card shadow rounded-4 p-4">

<h3>Edit Profil</h3>

<form action="{{ route('customer.account.update') }}" method="POST">

@csrf
@method('PUT')


<div class="mb-3">

<label>Nama</label>

<input type="text"
name="name"
class="form-control"
value="{{ $user->name }}">

</div>


<div class="mb-3">

<label>Email</label>

<input type="email"
name="email"
class="form-control"
value="{{ $user->email }}">

</div>


<button class="btn btn-warning">
Simpan Perubahan
</button>


</form>

</div>

</div>

@endsection