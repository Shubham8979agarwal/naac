<?php

namespace App\Http\Controllers;

//use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use DB;
use App\Models\Pdfs;
use Illuminate\Support\Facades\File;

class UIController extends Controller{

    public function __construct()
    {
        $this->middleware('disable_back_btn');
    }

    #login
    public function login()
    {  
        if(Auth::check()){
            return redirect('dashboard');
        }
        else{
            return view('login');
        }
        
    }
   
   public function make_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }
        return redirect("/")->with('status_signin_failed','Login details are not valid');
    }
    
    public function dashboard()
    {
       $data['getallpdfs'] =  Pdfs::all(); 
       return view('admin.dashboard',$data);
        
    }

    public function upload_file()
    { 
       $dir = public_path().'/assets/mystorage/';
       $data['getallfolders'] = array_slice(scandir($dir), 2);  
       return view('admin.upload-file',$data);
        
    }
    
    public function signout(){
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }

    public function publish_file(Request $request)
     {
        if(Auth::check()){
            $alldata=$this->validate($request, [
                'file_title' => 'required|string',
                'choose_folder' => 'required|string',
                'upload_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,xls,xlsx,docx,doc,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:307200',
        ]);
        $publish_pdf = new Pdfs(); 
        $pdfname = $request->upload_file->getClientOriginalName();  
        $request->upload_file->move(public_path('assets/mystorage/'.$request->choose_folder), $pdfname);
        $publish_pdf->choose_folder = $request->get('choose_folder');
        $publish_pdf->file_title = $request->get('file_title');
        $publish_pdf->upload_file = $request->choose_folder."/".$pdfname;
        $publish_pdf->save();
        return redirect('upload-file')->with('message', 'File Published Successfully');
        }
        else{
            return redirect("login");
        }
        
    }

    public function createnewfolder()
    {
        return view('admin.create-new-folder');
    }

    public function makeafolder(Request $request)
     {
        if(Auth::check()){
            $alldata=$this->validate($request, [
                'folder_name' => 'required|string',
        ]);
        
        $path = public_path().'/assets/mystorage/'.$request->get('folder_name');
        if (! File::exists($path)) {
            File::makeDirectory($path);
        }
        return redirect('create-new-folder')->with('message', 'Folder Created Successfully');
        }
        else{
            return redirect("login");
        }
        
    }

    public function delete_pdf($id)
    {  
            $id = decrypt($id);
            /* deleting pdf from the folder*/
            $getdata = Pdfs::find($id);
            $unlink = public_path("assets/mystorage/").$getdata->upload_file;
            //dd($unlink);
            $delete_pdf = unlink($unlink);
            $deletereq = DB::delete('delete from pdfs where id = ?',[$id]);
            return redirect('dashboard')->with('message','PDF Deleted Successfully');
    }

    public function viewallfolders(){
       $dir = public_path().'/assets/mystorage/';
       $data['getallfolders'] = array_slice(scandir($dir), 2); 
        return view('admin.view-all-folders',$data);
    }
    
    public function get_pdfs_from_folders($foldername){
       $dir = public_path().'/assets/mystorage/';
       $data['getallfolders'] = array_slice(scandir($dir), 2);
       $path = public_path('assets/mystorage/').$foldername;
       $files['allfiles'] = array_slice(scandir($path),2);
       //dd($files['allfiles']);
       return view('admin.getpdfsfromfolders',$files);
    }

    public function delete_folder($foldername)
    {  
            /* deleting folder */
            $path = public_path('assets/mystorage/').$foldername;
            $deletereq = DB::delete('delete from pdfs where choose_folder = ?',[$foldername]);
            if (\File::exists($path)) \File::deleteDirectory($path);
            return redirect('view-all-folders')->with('message','Folder Deleted Successfully');
    }
    
}