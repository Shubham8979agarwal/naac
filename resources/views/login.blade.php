@include('common.header')

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        	<br><br>
            <h1 class="text-center login-title">JB Institute Of Technology</h1>
            <div class="account-wall">
                <img class="profile-img" src="{{ url('assets/img/user.png') }}"
                    alt="admin-img">
                <form class="form-signin" action="{{ route('make-login') }}" method="POST">
                 @csrf
                 @if (session('status_signin_failed'))
                <div class="alert alert-danger">
                   {{ session('status_signin_failed') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </div>
                @endif	
                <input type="text" name="username" class="form-control" placeholder="Username/Login ID" required>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br>

@include('common.footer')