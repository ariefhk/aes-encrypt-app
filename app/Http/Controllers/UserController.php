<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = User::query()->limit(10);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return "<div class='d-flex gap-2'>
                                <a href='/detail/" . $row->id . "' class='edit btn btn-primary'>View</a>
                                    <button type='button' data-bs-target='#exampleModal" . $row->id . "'  data-bs-toggle='modal' class='btn btn-danger'>Delete</button>
                            </div>
                            <div class='modal fade' id='exampleModal" . $row->id . "' tabindex='-1' aria-labelledby='exampleModalLabel" . $row->id . "' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h1 class='modal-title fs-5' id='exampleModalLabel" . $row->id . "'>Modal title</h1>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            test" . $row->id . "
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal" . $row->id . "'>Close</button>
                                            <button type='button' class='btn btn-primary'>Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            ";
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
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
    }
}
