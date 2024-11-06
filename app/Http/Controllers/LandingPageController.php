<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    // -r : resources : membuat method/func untuk CRUD nya
    // mengambil banyak data/menampilkan halaman awal (CRUD : R all)
    public function index()
    {
        //proses pemanggilan file blade
        return view('landing-page');
    }

    // menampilkan halaman form tambah data
    public function create()
    {
        //
    }

    // menambahkan data ke database/mengirirm data dari form create
    public function store(Request $request)
    {
        //
    }

    // menampilkan hanya satu data(detail data)
    public function show(string $id)
    {
        //
    }

    // menampilkan halaman untuk edit data
    public function edit(string $id)
    {
        //
    }

    // mengubah data di database/ memproses data dari form edit
    public function update(Request $request, string $id)
    {
        //
    }

    // menghapus data di database
    public function destroy(string $id)
    {
        //
    }
}
