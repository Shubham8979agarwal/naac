@include('common.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-8 col-md-offset-2">
         <br><br><br>   
         <!-- <a href="{{ route('create-new-folder') }}"><button class="btn btn-primary" style="float:right">Create New Folder</button></a>   
         <br><br><br> -->
         <table id="example" class="table table-striped table-bordered" style="width:100%">
         @if (session('message'))
                <div class="alert alert-success">
                   {{ session('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </div>
        @endif   
        <thead>
            <tr>
                <th>Folder(s) Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($getallfolders)>0)
            @foreach($getallfolders as $folder)
            <tr>
                <td><a href="{{ url('get-pdfs-from-folders').'/'.$folder}}"> <i class="fa fa-folder" aria-hidden="true"></i> {{ $folder }}</a></td>
                <td><a onclick="return confirm('Are you sure?')" href="{{ url('delete-folder').'/'.$folder}}" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> Delete Folder</a></td>
            </tr>
            @endforeach
            @else
            <p>No Data Found!</p>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>Folder(s) Name</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>    
        </div>
    </div>
</div>
<br><br><br>

@include('common.footer')