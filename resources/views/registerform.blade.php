@extends('layouts.app')

@push('styles')

@endpush

@section('title', 'REGISTER')


@section('content')
    <div style="display:flex; flex-direction: column; justify-content:center; align-items: center; font-size: 20px;">
        <form action='/server.php/register' method='POST'  style="display: flex; flex-direction: column; width: 40%; justify-content: space-around; padding: 50px; height: 200px;"> 
        @csrf
        <label>
            <span>EMAIL:</span>
            <input type="text" name="email" value="{{old('email')}}">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </label>
        <label>
            <span>PASSWORD:</span>
            <input type="text" name="password" value="{{old('password')}}">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </label>
        <label>
            <span>NAME:</span>
            <input type="text" name="name" value="{{old('name')}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </label>
        <input type="submit" name="" style="width: 100px;" value="REGISTER">
        </form>
    </div>
@endsection