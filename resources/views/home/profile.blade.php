
@extends('index')

@section('content')
    <div class="container">
        <h2>Edit Profile</h2>
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('post')
            
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" maxlength="30">

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" maxlength="20">

            <label for="address">Address:</label>
            <textarea name="address" maxlength="200">{{ old('address', $user->address) }}</textarea>

            <button type="submit">Update Profile</button>
        </form>
    </div>
@endsection
