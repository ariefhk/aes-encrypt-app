<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $totalFiles = Files::count();
        $totaldecrytedFiles = Files::where('status', 'DECRYPTED')->count();
        $encrytedFiles = Files::where('status', 'ENCRYPTED')->count();

        return view('dashboard', [
            'totalFiles' => $totalFiles,
            'totaldecrytedFiles' => $totaldecrytedFiles,
            'encrytedFiles' => $encrytedFiles
        ]);
    }

    public function showAddEncrypt()
    {

        return view('add-encrypt');
    }

    public function showEncrypt(Request $request)
    {
        if ($request->ajax()) {
            $encrytedFiles = Files::where('status', 'ENCRYPTED')->limit(10)->latest()->get();

            return Datatables::of($encrytedFiles)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return "<div class='d-flex gap-2'>
                                <button type='button' data-bs-target='#exampleModal" . $row->id . "'  data-bs-toggle='modal' class='btn btn-danger'>Delete</button>
                            </div>
                            <div class='modal fade' id='exampleModal" . $row->id . "' tabindex='-1' aria-labelledby='exampleModalLabel" . $row->id . "' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h1 class='modal-title fs-5' id='exampleModalLabel" . $row->id . "'>
                                            Peringatan!
                                            </h1>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            Apakah Anda yakin akan menghapus file enkripsi <span class='fw-bold'>" . $row->name . "</span> ?
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button>
                                            <a href='" . route("file.destroy", ["id" => $row->id]) . "' class='btn btn-danger'>Hapus!</a>
                                        </div>
                                </div>
                                </div>
                            </div>
                            ";
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('encrypt');
    }


    public function showDecrypt(Request $request)
    {

        if ($request->ajax()) {
            $decrytedFiles = Files::where('status', 'DECRYPTED')->limit(10)->latest()->get();

            return Datatables::of($decrytedFiles)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return "<div class='d-flex gap-2'>
                                <button type='button' data-bs-target='#exampleModal" . $row->id . "'  data-bs-toggle='modal' class='btn btn-danger'>Delete</button>
                            </div>
                            <div class='modal fade' id='exampleModal" . $row->id . "' tabindex='-1' aria-labelledby='exampleModalLabel" . $row->id . "' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h1 class='modal-title fs-5' id='exampleModalLabel" . $row->id . "'>
                                            Peringatan!
                                            </h1>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            Apakah Anda yakin akan menghapus file enkripsi <span class='fw-bold'>" . $row->name . "</span> ?
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button>
                                            <a href='" . route("file.destroy", ["id" => $row->id]) . "' class='btn btn-danger'>Hapus!</a>
                                        </div>
                                </div>
                                </div>
                            </div>
                            ";
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('decrypt');
    }


    public function showAllFiles(Request $request)
    {

        if ($request->ajax()) {
            $allFiles = Files::all();

            return Datatables::of($allFiles)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return "<div class='d-flex gap-2'>"   . $this->defineButtonAllFiles($row->status, $row->id) . "
                                <button type='button' data-bs-target='#exampleModal" . $row->id . "'  data-bs-toggle='modal' class='btn btn-danger'>Delete</button>
                            </div>
                            <div class='modal fade' id='exampleModal" . $row->id . "' tabindex='-1' aria-labelledby='exampleModalLabel" . $row->id . "' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h1 class='modal-title fs-5' id='exampleModalLabel" . $row->id . "'>
                                            Peringatan!
                                            </h1>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            Apakah Anda yakin akan menghapus file enkripsi <span class='fw-bold'>" . $row->name . "</span> ?
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button>
                                            <a href='" . route("file.destroy", ["id" => $row->id]) . "' class='btn btn-danger'>Hapus!</a>
                                        </div>
                                </div>
                                </div>
                            </div>
                            ";
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('all-files');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $file = Files::findOrFail($id);
            $filePath = $file->location;
            Storage::delete($filePath);

            $file->deleteOrFail();
            return redirect()->route('all-files.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function encrypt(Request $request)
    {
        try {
            $secretKey = $request->secretKey;

            // Retrieve the uploaded file
            $file = $request->file('file');


            // Generate a unique file name
            $fileName = $file->getClientOriginalName();

            // Define the file location
            $fileLocation = 'encrypt/' . $fileName;

            // Encryption parameters
            $cipher = 'aes-256-cbc';
            $ivLength = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivLength);

            // Encrypt the content directly from the uploaded file
            $encryptedContent = openssl_encrypt(
                $file->get(),
                $cipher,
                $secretKey,
                OPENSSL_RAW_DATA,
                $iv
            );
            if ($encryptedContent === false) {
                // Encryption failed
                throw new \Exception('Encryption failed.');
            }

            // Concatenate the IV and the encrypted content
            $encryptedData = $iv . $encryptedContent;

            // Write the encrypted content along with the initialization vector (IV) to the output file using Laravel's Storage facade
            Storage::put($fileLocation, $encryptedData);

            $data = [
                'name' => $request->name,
                'status' => 'ENCRYPTED',
                'location' => $fileLocation,
                'size' => $file->getSize()
            ];

            Files::create($data);
            return redirect()->route('encrypt.index');
        } catch (\Exception $e) {
            // Log the exception
            // \Log::error('Error storing encrypted file: ' . $e->getMessage());
            return $e->getMessage();

            // Handle the error as needed (e.g., display a message to the user)
        }
    }

    public function decrypt(Request $request, string $id)
    {
        try {
            $secretKey = $request->secretKey;

            $fileData = Files::findOrFail($id);
            $filePath = $fileData->location;

            $encryptedData = Storage::get($filePath);
            // Get the initialization vector (IV) length
            $cipher = 'aes-256-cbc';
            $ivLength = openssl_cipher_iv_length($cipher);

            // Separate the IV from the encrypted content
            $iv = substr($encryptedData, 0, $ivLength);
            $encryptedContent = substr($encryptedData, $ivLength);

            // Decrypt the content
            $decryptedContent = openssl_decrypt(
                $encryptedContent,
                $cipher,
                $secretKey,
                OPENSSL_RAW_DATA,
                $iv
            );

            if ($decryptedContent === false) {
                // Decryption failed
                throw new \Exception('Decryption failed.');
            }

            // Generate a unique file name for decrypted file
            $fileName = basename($filePath);
            // Define the file location
            $fileLocation = 'decrypt/' . $fileName;

            // Write the decrypted content to a new file
            Storage::put($fileLocation, $decryptedContent);

            // Delete the original encrypted file
            Storage::delete($filePath);


            $fileData->update([
                'status' => 'DECRYPTED',
                'location' => $fileLocation
            ]);


            return redirect()->route('decrypt.index');
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function download(Request $request)
    {
        $filePath = $request->filePath;

        return Storage::download($filePath);
    }

    private function defineButtonAllFiles($status, $id)
    {
        switch ($status) {
            case 'ENCRYPTED':
                return "<a href='" . route('decrypt.index') . "' class='btn btn-secondary'>Dekripsi</a>";
            case 'DECRYPTED':
                return "<a href='" . route('all-files.index') . "' class='btn btn-warning'>Download</a>";
            default:
                return "<div class='d-flex align-items-center gap-2'>
                <a href='" . route('all-files.index') . "' class='btn btn-danger'>Enkripsi</a>
                <a href='" . route('all-files.index') . "' class='btn btn-danger'>Download</a>
                </div>";
        }
    }
}
