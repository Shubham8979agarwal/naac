@include('common.header')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-8 col-md-offset-2">
         <br><br><br>   
         <!-- <a href="{{ route('create-new-folder') }}"><button class="btn btn-primary" style="float:right"><i class="fa fa-plus" aria-hidden="true"></i> Create New Folder</button></a>   
         <br><br><br> -->
         <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($allfiles)>0)
            @foreach($allfiles as $pdfs)
            <tr>
                <td>
                <?php 
                $actual_link = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $lastWord = substr($actual_link, strrpos($actual_link, '/') + 1);
                $file_name = $pdfs;
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                //echo $extension;
                ?>
                @if($extension == "pdf")
                <a href="{{ url('assets/mystorage').'/'.$lastWord.'/'.$pdfs }}" target="_blank"><img src="{{ url('assets/img/pdf-image.png') }}"
                    alt="pdf-img" style="width:30px;height:30px;"> {{$pdfs}}</a><br><br>
                @elseif($extension == "doc" || $extension == "docx")
                <a href="{{ url('assets/mystorage').'/'.$lastWord.'/'.$pdfs }}" target="_blank"><img src="{{ url('assets/img/docx.png') }}"
                    alt="pdf-img" style="width:30px;height:30px;"> {{$pdfs}}</a><br><br>
                @elseif($extension == "jpeg" || $extension == "png" || $extension == "jpg" || $extension == "gif" || $extension == "svg") 
                <a href="{{ url('assets/mystorage').'/'.$lastWord.'/'.$pdfs }}" target="_blank"><img src="{{ url('assets/img/dummyimg.png') }}"
                    alt="pdf-img" style="width:30px;height:30px;"> {{$pdfs}}</a><br><br>
                @elseif($extension=="xls" || $extension=="xlsx")
                 <a href="{{ url('assets/mystorage').'/'.$lastWord.'/'.$pdfs }}" target="_blank"><img src="{{ url('assets/img/xls.png') }}"
                    alt="pdf-img" style="width:30px;height:30px;"> {{$pdfs}}</a><br><br> 
                @elseif($extension=="mpeg" || $extension=="ogg" || $extension=="mp4" || $extension=="webm" || $extension=="3gp" || $extension=="mov" || $extension=="mp4" || $extension=="webm" || $extension=="3gp" || $extension=="MOV" || $extension=="flv" || $extension=="avi" || $extension=="wmv" || $extension=="ts")
                 <a href="{{ url('assets/mystorage').'/'.$lastWord.'/'.$pdfs }}" target="_blank"><img src="{{ url('assets/img/video.png') }}"
                    alt="pdf-img" style="width:30px;height:30px;"> {{$pdfs}}</a><br><br>      
                @endif 
                </td>
                <td>
                    @if($extension == "doc" || $extension == "docx")
                    <a class="btn btn-success" href="https://docs.google.com/viewer?url={{ url('assets/mystorage').'/'.$lastWord.'/'.$pdfs }}" target="_blank"><i class="fa fa-eye"></i> View
                    </a>
                    @else
                    <a class="btn btn-success" href="{{ url('assets/mystorage').'/'.$lastWord.'/'.$pdfs }}" target="_blank"><i class="fa fa-eye"></i> View
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
            @else
            <p>No data found!</p>
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