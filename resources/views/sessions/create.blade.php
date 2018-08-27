@extends ('layouts.admin')

@section ('content')
    <h1>Sign In</h1>

    <form method="POST" actions="/login">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">Login</button>
        </div>
    </form>
@endsection
