@include('common.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-8 col-md-offset-2">
          <br><br><br>
            <h1 class="text-center login-title">Start Creating New Folders</h1>
            <div class="account-wall">
                <form class="form-signin" action="{{ route('makeafolder') }}" method="POST">
                 @csrf


                @if (session('message'))
                <div class="alert alert-success">
                   {{ session('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </div>
                @endif

                <label for="title">Folder Name/Title</label>  
                <input type="text" name="folder_name" class="form-control" placeholder="Enter Folder Name/Title" value ="{{ old('folder_name') }}">
                 <p>@error('folder_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror</p>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Create Folder</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('common.footer')