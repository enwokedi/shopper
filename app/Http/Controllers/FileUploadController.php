<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class FileUploadController extends Controller
{
    public function createForm($id)
    {
        $user_id = $id;
        // dd($user_id);
        return view('home.file-upload')->with('user_id', $user_id);
    }

    public function fileUpload(Request $req, $id)
    {
        $user_id = $id;

        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png|max:2048'
        ]);
        $fileModel = new File;
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName)
                ->with('user_id', $user_id);
        }
    }

    public function createDlFront($id)
    {
        $user_id = $id;
        // dd($user_id);
        return view('home.upload-front')->with('user_id', $user_id);
    }

    public function DlFront(Request $req, $id)
    {
        $user_id = $id;

        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png|max:2048'
        ]);
        $fileModel = new File;
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName)
                ->with('user_id', $user_id);
        }
    }

    public function createDlBack($id)
    {
        $user_id = $id;
        // dd($user_id);
        return view("home.upload-back", compact("user_id")); //->with('user_id', $user_id);
    }

    public function dlBack(Request $req)
    {
        $previousUrl = URL()->previous();
        if (preg_match("/\/(\d+)$/", $previousUrl, $matches)) {
            $user_id = $matches[1];
        } else {
            //Your URL didn't match.  This may or may not be a bad thing.
        }
        // dd($user_id);

        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png|max:2048'
        ]);
        $fileModel = new File;
        if ($req->file()) {
            $fileName = time() . '_' . 'DL Back'; // $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->user_id = $user_id;
            $fileModel->document_type = "DL Back";
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName)
                ->with('user_id', $user_id);
        }
    }

    public function IdProof(Request $req, $id)
    {
        $user_id = $id;

        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png|max:2048'
        ]);
        $fileModel = new File;
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName)
                ->with('user_id', $user_id);
        }
    }

    public function AddressProof(Request $req, $id)
    {
        $user_id = $id;

        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png|max:2048'
        ]);
        $fileModel = new File;
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName)
                ->with('user_id', $user_id);
        }
    }

    public function InsuranceCertificate(Request $req, $id)
    {
        $user_id = $id;

        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png|max:2048'
        ]);
        $fileModel = new File;
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName)
                ->with('user_id', $user_id);
        }
    }
}
