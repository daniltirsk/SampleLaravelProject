@extends('layouts.app')

@push('styles')

@endpush

@section('title', 'LOGIN')


@section('content')
    <div style="display:flex; flex-direction: column; justify-content:center; align-items: center; font-size: 20px;">
        <form action='/server.php/login' method='POST'  style="display: flex; flex-direction: column; width: 40%; justify-content: space-around; padding: 50px; height: 200px;"> 
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
        <input type="submit" name="" style="width: 100px;" value="LOGIN">
        </form>
        <div style="display:flex; flex-direction:column; align-items:center;">
            <span style="margin-bottom: 10px;">
                Don't have an account? Register instead
            </span>
            <form action="/server.php/registerform">
                <input type="submit" name="" value="REGISTER">
            </form>
        </div>
    </div>
@endsection