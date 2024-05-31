<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $totalFiles = Files::where('user_id', $userId)->where('status', 'DECRYPTED')->count();
        $totalDecryptedFiles = Files::where('user_id', $userId)->where('status', 'DECRYPTED')->count();
        $encryptedFiles = Files::where('user_id', $userId)->where('status', 'ENCRYPTED')->count();

        return view('dashboard', [
            'totalFiles' => $totalFiles,
            'totaldecrytedFiles' => $totalDecryptedFiles,
            'encrytedFiles' => $encryptedFiles
        ]);
    }

    public function showAddEncrypt()
    {

        return view('add-encrypt');
    }
    public function showDecryptFromEncrypt($id)
    {
        $userId = Auth::id();
        $data = Files::where('user_id', $userId)->findOrFail($id);

        return view('encrypt-decrypt', [
            'id' => $data->id,
            'name' => $data->name,
            'size' => $this->convertToAppropriateUnit($data->size)
        ]);
    }

    public function showEncryptFromDecrypt($id)
    {
        $userId = Auth::id();
        $data = Files::where('user_id', $userId)->findOrFail($id);

        return view('decrypt-encrypt', [
            'id' => $data->id,
            'name' => $data->name,
            'size' => $this->convertToAppropriateUnit($data->size)
        ]);
    }

    public function showEncrypt(Request $request)

    {
        $userId = Auth::id();
        if ($request->ajax()) {
            $encryptedFiles = Files::where('user_id', $userId)
                ->where('status', 'ENCRYPTED')
                ->latest()
                ->limit(10)
                ->get();

            return Datatables::of($encryptedFiles)
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


        return view('encrypt');
    }


    public function showDecrypt(Request $request)
    {

        $userId = Auth::id();
        if ($request->ajax()) {
            $decryptedFiles = Files::where('user_id', $userId)
                ->where('status', 'DECRYPTED')
                ->latest()
                ->limit(10)
                ->get();

            return Datatables::of($decryptedFiles)
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
        return view('decrypt');
    }


    public function showAllFiles(Request $request)
    {
        $userId = Auth::id();

        if ($request->ajax()) {
            $files = Files::where('user_id', $userId)->get();

            return Datatables::of($files)
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
            $userId = Auth::id();
            $file = Files::where('user_id', $userId)->findOrFail($id);
            $filePath = $file->location;
            Storage::delete($filePath);

            $file->deleteOrFail();
            return redirect()->route('all-files.index')->with('success', 'File ' . $file->name . ' sukses dihapus!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function encrypt(Request $request)
    {
        try {
            $userId = Auth::id();

            if (isset($request->id)) {
                $validatedData = $request->validate([
                    'secretKey' => ['required', 'string', 'max:64'],
                ]);

                // Retrieve the validated secret key
                $secretKey = $validatedData['secretKey'];
                $fileData = Files::where('user_id', $userId)->findOrFail($request->id);
                $file = Storage::get($fileData->location);
                $fileName = $fileData->original_name;

                // Define the file location
                $fileLocation = 'encrypt/' . $fileName;

                // Encryption parameters
                $cipher = 'aes-256-cbc';
                $ivLength = openssl_cipher_iv_length($cipher);
                $iv = openssl_random_pseudo_bytes($ivLength);

                // Encrypt the content directly from the uploaded file
                $encryptedContent = openssl_encrypt(
                    $file,
                    $cipher,
                    $secretKey,
                    OPENSSL_RAW_DATA,
                    $iv
                );
                if ($encryptedContent === false) {
                    // Encryption failed
                    throw new \Exception('Enkripsi Gagal!');
                }

                // Concatenate the IV and the encrypted content
                $encryptedData = $iv . $encryptedContent;

                // Write the encrypted content along with the initialization vector (IV) to the output file using Laravel's Storage facade
                Storage::put($fileLocation, $encryptedData);


                // Delete the original encrypted file
                Storage::delete($fileData->location);


                $fileData->update([
                    'status' => 'ENCRYPTED',
                    'location' => $fileLocation
                ]);

                return redirect()->route('encrypt.index')->with('success', 'File ' . $fileData->name . ' sukses didekripsi!');
            } else {
                // Validate the file upload
                $validatedDataFile = $request->validate([
                    'name' => ['required', 'string'],
                    'secretKey' => ['required', 'string', 'max:64'],
                    'file' => ['required', 'file', 'max:2048'], // max size in kilobytes (2048 KB = 2 MB)
                ]);

                // Retrieve the validated file
                $file = $validatedDataFile['file'];
                $secretKey = $validatedDataFile['secretKey'];

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
                    throw new \Exception('Enkripsi Gagal!');
                }

                // Concatenate the IV and the encrypted content
                $encryptedData = $iv . $encryptedContent;

                // Write the encrypted content along with the initialization vector (IV) to the output file using Laravel's Storage facade
                Storage::put($fileLocation, $encryptedData);

                $data = [
                    'name' => $validatedDataFile['name'],
                    'original_name' =>  $fileName,
                    'status' => 'ENCRYPTED',
                    'location' => $fileLocation,
                    'size' => $file->getSize(),
                    'user_id' => Auth::id()
                ];

                Files::create($data);

                return redirect()->route('encrypt.index')->with('success', 'File ' . $validatedDataFile['name'] . ' sukses didekripsi!');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Log the exception
            // return $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
            // Handle the error as needed (e.g., display a message to the user)
        }
    }

    public function decrypt(Request $request, string $id)
    {
        try {
            $userId = Auth::id();
            $validatedSecretKey = $request->validate([
                'secretKey' => 'required|string|max:64',
            ]);

            // Retrieve the validated secret key
            $secretKey = $validatedSecretKey['secretKey'];

            $fileData = Files::where('user_id', $userId)->findOrFail($id);
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
                throw new \Exception('Dekripsi Gagal, pastikan Sandi Rahasia sesuai!');
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


            return redirect()->route('decrypt.index')->with('success', 'File ' . $fileData->name . ' sukses didekripsi!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {


            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function download(string $id)
    {
        $userId = Auth::id();
        $file = Files::where('user_id', $userId)->findOrFail($id);
        $filePath = $file->location;

        return Storage::download($filePath);
    }

    private function defineButtonAllFiles($status, $id)
    {
        switch ($status) {
            case 'ENCRYPTED':
                return "<div class='d-flex align-items-center gap-2'>
                <a href='" . route('file.download', ['id' => $id]) . "' class='btn btn-warning'>Download</a>
                <a href='" . route('encrypt.decrypt', ['id' => $id]) . "' class='btn btn-secondary'>Dekrip</a>
                </div>";
            case 'DECRYPTED':
                return "<div class='d-flex align-items-center gap-2'>
                <a href='" . route('file.download', ['id' => $id]) . "' class='btn btn-warning'>Download</a>
                <a href='" . route('decrypt.encrypt', ['id' => $id]) . "' class='btn btn-primary'>Enkrip</a>
                </div>";
            default:
                return "<div class='d-flex align-items-center gap-2'>
                <a href='" . route('all-files.index') . "' class='btn btn-danger'>Enkripsi</a>
                <a href='" . route('file.download', ['id' => $id]) . "' class='btn btn-danger'>Download</a>
                </div>";
        }
    }

    private function bytesToKB($bytes)
    {
        return number_format($bytes / 1024, 2);
    }

    private function bytesToMB($bytes)
    {
        return number_format($bytes / (1024 * 1024), 2);
    }

    private   function convertToAppropriateUnit($bytes)
    {
        if ($bytes >= 1024 && $bytes < 1024 * 1024) {
            return $this->bytesToKB($bytes) . " KB";
        } elseif ($bytes >= 1024 * 1024) {
            return $this->bytesToMB($bytes) . " MB";
        } else {
            return $bytes . " bytes";
        }
    }
}
