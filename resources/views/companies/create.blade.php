@extends('layouts.app')

@section('title', 'Add Company')

@section('content')
<h1>Add Company</h1>
<form method="POST" action="{{ route('companies.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Company Name" required>
    <select name="type">
        <option value="as">AS</option>
        <option value="sro">SRO</option>
        <option value="szčo">SZČO</option>
    </select>
    <input type="text" name="ico_companies" placeholder="ICO" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Save</button>
</form>
@endsection
