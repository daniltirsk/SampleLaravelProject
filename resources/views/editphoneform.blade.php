@extends('layouts.app')

@push('styles')

@endpush

@section('title', 'Page Title')


@section('content')
    @if (count($phones) > 0)
    @foreach ($phones as $phone)
    <div class="phoneformcontainer">
        <form action='/server.php/editphone' method='POST' class='editphoneform form'> 
        @csrf
        <input type="text" name="id" value="{{$phone->id}}" hidden>
        <label>
            <span class="formtext">Name:</span>
            <input type="text" name="name" value="{{$phone->name}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </label>
        <label>
            <span class="formtext">Phone number:</span>
            <input type="text" name="phones" value="{{$phone->phone_numbers}}">
            @error('phones')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </label>
        <label>
            <span class="formtext">Role:</span>
            <select name="role">
              <option value="Relative" {{ $phone->role == 'Relative' ? 'selected':''}}>Relative</option>
              <option value="Friend" {{ $phone->role == 'Friend' ? 'selected':''}}>Friend</option>
              <option value="Collegue"  {{ $phone->role == 'Collegue' ? 'selected':''}}>Collegue</option>
              <option value="Acquaintance"  {{ $phone->role == 'Acquaintance' ? 'selected':''}}>Acquaintance</option>
              <option value="Work"  {{ $phone->role == 'Work' ? 'selected':''}}>Work</option>
              <option value="Other"  {{ $phone->role == 'Other' ? 'selected':''}}>Other</option>
            </select>
            @error('role')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </label>
        <input type="submit" name="" class="submitBtn" value="EDIT">
        </form>
    </div>
    @endforeach
    @endif
@endsection