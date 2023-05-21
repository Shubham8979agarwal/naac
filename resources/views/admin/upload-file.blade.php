@include('common.header')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-8 col-md-offset-2">
          <br><br><br>
            <h1 class="text-center login-title">Start Uploading Files</h1>
            <div class="account-wall">
                <form class="form-signin" action="{{ route('publish-file') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                @if (session('message'))
                <div class="alert alert-success">
                   {{ session('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </div>
                @endif

                <label for="title">File Name/Title</label>  
                <input type="text" name="file_title" class="form-control" placeholder="Enter File Name/Title" value ="{{ old('file_title') }}">
                 <p>@error('file_title')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror</p>

                <label for="title">Choose Folder</label><br>
                <select name="choose_folder" id="choose_folder" class="form-control">
                  @if(count($getallfolders)>0)
                  @foreach($getallfolders as $folders)  
                  <option value="{{ $folders }}">{{ $folders }}</option>
                  @endforeach
                  @else
                  <option value="">No Folders Found! Please Create Folder</option>
                  @endif
                </select>
                 <p>@error('choose_folder')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror</p>

                 <label>Upload File</label>
                 <input type="file" name="upload_file" class="form-control" value="{{ old('upload_file') }}">
                  <p>@error('upload_file')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror</p>

                  
                <button class="btn btn-lg btn-primary btn-block" type="submit">Upload File</button>
                </form>
            </div>
        </div>
    </div>
</div>


@include('common.footer')