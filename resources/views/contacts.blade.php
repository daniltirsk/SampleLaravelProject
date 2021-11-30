@extends('layouts.app')


@section('content')
    <div class="container">
        <div class='addphonecontainer'>
            <form action='/server.php/addphone' method='POST' class="addphoneform form"> 
            @csrf
                <label>
                    <span class="formtext">Name:</span>
                    <input type="text" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </label>
                <label>
                    <span class="formtext">Phone number:</span>
                    <input type="text" name="phones" value="{{ old('phones') }}">
                    @error('phones')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </label>
                <label>
                    <span class="formtext">Role:</span>
                    <select name="role">
                      <option value="Relative" {{ old('role') == 'Relative' ? 'selected':''}}>Relative</option>
                      <option value="Friend" {{ old('role') == 'Friend' ? 'selected':''}}>Friend</option>
                      <option value="Collegue"  {{ old('role') == 'Collegue' ? 'selected':''}}>Collegue</option>
                      <option value="Acquaintance"  {{ old('role') == 'Acquaintance' ? 'selected':''}}>Acquaintance</option>
                      <option value="Work"  {{ old('role') == 'Work' ? 'selected':''}}>Work</option>
                      <option value="Other"  {{ old('role') == 'Other' ? 'selected':''}}>Other</option>
                    </select>
                    @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </label>
                <input type="submit" name="" class="submitBtn" value="ADD">
                </form>
        </div>
            <div>
                <h2 class="greeting">{{$user_name}}'s phone book</h2>
            </div>

            <div>
                <table class="phonestable">
                    <thead>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th class="button_container"></th>
                        <th class="button_container"></th>
                    </thead>
                    <tbody>
                        @if (count($phones) > 0)
                        @foreach ($phones as $phone)
                            <tr>
                                <td>
                                    <div>{{ $phone->name }}</div>
                                </td>
                                <td>
                                    <div>{{ $phone->role }}</div>
                                </td>
                                <td>
                                    <div>{{ $phone->phone_numbers }}</div>
                                </td>
                                <td class="button_container">
                                    <div>
                                        <form action='/server.php/editphoneform/{{$phone->id}}' method='GET'>
                                            @csrf
                                            <input type="submit" name="edit" value='Edit'>
                                        </form>
                                    </div>
                                </td>
                                <td class="button_container">
                                    <div>
                                        <form action='/server.php/deletephone/{{$phone->id}}' method='POST'>
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="submit" name="delete" value='Delete'>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{ $phones->links() }}
@endsection