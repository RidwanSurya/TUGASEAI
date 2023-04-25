<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sepatu;
use Exception;
use App\Helpers\ApiFormatter;

class sepatucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data = sepatu::all();
        return response()->json([
            'data' => $data
        ]);

        // if($data) {
        //     return ApiFormatter::createApi(200, 'Success',$data);
        // } else {
        //     return ApiFormatter::createApi(400, 'Failed');
        // }
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
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'harga' => 'required'
            ]);
        
            $sepatu = Sepatu::create($validatedData);
        
            $data = Sepatu::where('id', $sepatu->id)->get();
        
            if ($data->isNotEmpty()) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (ValidationException $error) {
            return ApiFormatter::createApi(400, 'Failed', $error->errors());
        } catch (Exception $error) {
            return ApiFormatter::createApi(500, 'Server Error');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = sepatu::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request $request, string $id)
    {
        try {
            $request->validate([
                'harga' => 'required',
            ]);


            $sepatu = sepatu::findOrFail($id);

            $sepatu->update([
                'harga' => $request->harga,
            ]);

            $data = sepatu::where('id', '=', $sepatu->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama' => 'required',
            ]);


            $sepatu = sepatu::findOrFail($id);

            $sepatu->update([
                'nama' => $request->nama,
            ]);

            $data = sepatu::where('id', '=', $sepatu->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $sepatu = sepatu::findOrFail($id);

            $data = $sepatu->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Destory data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
