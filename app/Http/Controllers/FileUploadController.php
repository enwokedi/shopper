<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\UserController;

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

    public function DlFront(Request $req)
    {
        $previousUrl = URL()->previous();
        if (preg_match("/\/(\d+)$/", $previousUrl, $matches)) {
            $user_id = $matches[1];
        } else {
            //Your URL didn't match.  This may or may not be a bad thing.
        }

        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png|max:2048'
        ]);
        $fileModel = new File;
        if ($req->file()) {
            $fileName = time() . '_' . 'DL Front'; // $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->user_id = $user_id;
            $fileModel->document_type = "Driving Licence Front";
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return to_route('users.show', [$user_id])
                ->with('success', 'The front of the driving licence has been uploaded.');
            // return redirect()->action(
            //     [UserController::class, 'users'],
            //     ['id' => 15]
            // );
            // return back()
            //     ->with('success', 'The front of the driving licence has been uploaded.')
            //     ->with('file', $fileName)
            //     ->with('user_id', $user_id);
        }
    }

    public function createDlBack($id)
    {
        $user_id = $id;
        // dd($user_id);
        return view("home.upload-back", compact("user_id")); //->with('user_id', $user_id);
    }

    public function DlBack(Request $req)
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
            $fileName = time() . '_' . 'DL - Back'; // $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->user_id = $user_id;
            $fileModel->document_type = "Driving Licence - Back";
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return to_route('users.show', [$user_id])
                ->with('success', 'The back of the driving licence has been uploaded.');
            // return back()
            //     ->with('success', 'The back of the driving licence has been uploaded.')
            //     ->with('file', $fileName)
            //     ->with('user_id', $user_id);
        }
    }

    public function createIdProof($id)
    {
        $user_id = $id;
        // dd($user_id);
        return view('home.upload-poid')->with('user_id', $user_id);
    }

    public function IdProof(Request $req, $id)
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
            $fileName = time() . '_' . 'Proof of ID'; // $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->user_id = $user_id;
            $fileModel->document_type = "Proof of ID";
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return to_route('users.show', [$user_id])
                ->with('success', 'Proof of ID has been uploaded.');
            // return back()
            //     ->with('success', 'Proof of ID has been uploaded.')
            //     ->with('file', $fileName)
            //     ->with('user_id', $user_id);
        }
    }

    public function createAddProof($id)
    {
        $user_id = $id;
        // dd($user_id);
        return view('home.upload-poadd')->with('user_id', $user_id);
    }

    public function AddressProof(Request $req)
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
            $fileName = time() . '_' . 'Proof of Address'; // $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->user_id = $user_id;
            $fileModel->document_type = "Proof of Address";
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return to_route('users.show', [$user_id])
                ->with('success', 'Proof of Address has been uploaded.');
            // return back()
            //     ->with('success', 'Proof of address has been uploaded.')
            //     ->with('file', $fileName)
            //     ->with('user_id', $user_id);
        }
    }

    public function createInsProof($id)
    {
        $user_id = $id;
        // dd($user_id);
        return view('home.upload-poins')->with('user_id', $user_id);
    }

    public function InsuranceCertificate(Request $req)
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
            $fileName = time() . '_' . 'Insurance Certificate'; // $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->user_id = $user_id;
            $fileModel->document_type = "Insurance Certificate";
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return to_route('users.show', [$user_id])
                ->with('success', 'Insurance has been uploaded.');
            // return back()
            //     ->with('success', 'Insurance certificate has been uploaded.')
            //     ->with('file', $fileName)
            //     ->with('user_id', $user_id);
        }
    }

    public function createCbt($id)
    {
        $previousUrl = URL()->previous();

        $user_id = $id;

        return view('home.upload-pocbt')->with('user_id', $user_id);
    }

    public function CbtProof(Request $req)
    {
        $previousUrl = URL()->previous();
        if (preg_match("/\/(\d+)$/", $previousUrl, $matches)) {
            $user_id = $matches[1];
        } else {
            //Your URL didn't match.  This may or may not be a bad thing.
        }

        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg,png|max:2048'
        ]);
        $fileModel = new File;
        if ($req->file()) {
            $fileName = time() . '_' . 'CBT Certificate'; // $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->user_id = $user_id;
            $fileModel->document_type = "CBT Certificate";
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return to_route('users.show', [$user_id])
                ->with('success', 'CBT has been uploaded.');
            // return redirect($previousUrl)
            //     ->with('success', 'CBT has been uploaded.')
            //     ->with('file', $fileName)
            //     ->with('user_id', $user_id);
        }
    }

    public function delete(Request $request, $id)
    {
        $file = File::findOrFail($id);
        $file->delete();

        $previousUrl = URL()->previous();

        return redirect($previousUrl)
            ->with('success', 'File has been deleted.');
    }
}
