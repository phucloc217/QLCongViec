<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonHocRequest;
use App\Models\Monhoc;
use Illuminate\Http\Request;

class MonHocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Monhoc::all();
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
    public function store(MonHocRequest $request)
    {
        $MonHoc = new MonHoc();
        $MonHoc->TenMH = $request->TenMH;
        $MonHoc->Lop = $request->Lop;
        $MonHoc->LT = $request->LT;
        $MonHoc->TH = $request->TH;
        $MonHoc->NgayThi = $request->NgayThi;
        $MonHoc->NgayThanhToan = $request->NgayThanhToan;
        return $MonHoc->save();
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
        $MonHoc = MonHoc::find($id);
        return $MonHoc->delete();
    }
}
