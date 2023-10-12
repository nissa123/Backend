<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Category::get();
            return response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
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
    public function store(CategoryRequest $request)
    {
        try {
            $data = Category::create($request->all());
            return response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        try {
            return response()->json(['status' => true, 'data'->$category]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'data failed to get','error_type'-> $e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $data = $category->update($request->all());
            return response()->json(['status' => true, 'message' => 'data berhasil diupdate']);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'data gagal diupdate','error_type'-> $e]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
       
        try {
            $data = $category->delete();
            return response()->json(['status' => true, 'message' => 'data berhasil dihapus', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'data gagal dihapus']);
        } 
    }
}
