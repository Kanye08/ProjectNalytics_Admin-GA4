<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\GoogleExport;
use App\Imports\GoogleImport;
use App\Models\Google;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function index()
    {
        $googles = Google::get();

        return view('admin.google.index', compact('googles'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new GoogleExport, 'google.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new GoogleImport, request()->file('file'));
        return back();
    }
}






// use Illuminate\Support\Facades\Storage;