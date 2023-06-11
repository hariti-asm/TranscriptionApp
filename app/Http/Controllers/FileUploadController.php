<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request)
{
    // Create a variable referencing the uploaded file from the request
    $file = $request->file('upload');

    // Store the file in storage/app/uploads
    $file->store('uploads');

    // Redirect to the success page
    return redirect()->route('fileUpload.success');
}
public function success()
{
    return 'Success!';
}
}
