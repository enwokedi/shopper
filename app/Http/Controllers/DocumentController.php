<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Traits\Upload; //import the trait
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    use Upload; //add this trait

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $this->UploadFile($request->file('file'), 'Products'); //use the method in the trait
            Documents::create([
                'path' => $path
            ]);
            return redirect()->route('files.index')->with('success', 'File uploaded successfully');
        }
    }
}
