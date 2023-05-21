@include('common.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-8 col-md-offset-2">
         <br><br><br>   
         <a href="{{ route('create-new-folder') }}"><button class="btn btn-primary" style="float:right"><i class="fa fa-plus" aria-hidden="true"></i> Create New Folder</button></a>   
         <br><br><br>
         <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($getallpdfs)>0)
            @foreach($getallpdfs as $pdf_data)
            <tr>
                <td>{{ $pdf_data->file_title }}</td>
                <td>
                    <?php 
                        $actual_link = "$pdf_data->upload_file";
                        $file_name = $actual_link;
                        $temp= explode('.',$file_name);
                        $extension = end($temp);
                        //echo $extension;
                    ?>
                    @if($extension == "doc" || $extension == "docx")
                    <a class="btn btn-success" href="https://docs.google.com/viewer?url={{ url('assets/mystorage').'/'.$pdf_data->upload_file }}" target="_blank"><i class="fa fa-eye"></i> View</a> &nbsp; &nbsp;
                    @else
                    <a class="btn btn-success" href="{{ url('assets/mystorage').'/'.$pdf_data->upload_file }}" target="_blank"><i class="fa fa-eye"></i> View</a> &nbsp; &nbsp;
                    @endif
                    
                    <a class="btn btn-primary" href="{{ url('assets/mystorage').'/'.$pdf_data->upload_file }}" target="_blank"><i class="fa fa-download"></i> Download</a> &nbsp; &nbsp; <a onclick="return confirm('Are you sure?')" href="delete-pdf/{{ encrypt($pdf_data->id) }}" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>    
        </div>
    </div>
</div>
<br><br><br>

@include('common.footer')