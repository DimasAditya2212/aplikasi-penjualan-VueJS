<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('nama_item', 'desc')->get();
        return $response = [
            'message' => 'Item Stored',
            'data' => $items
        ];

        // return $response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_item' => ['required'],
            'unit' => ['required'],
            'stok' => ['required', 'numeric'],
            'harga_satuan' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $items = Item::create($request->all());
            $response = [
                'message' => 'Item Stored',
                'data' => $items
            ];

            response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemsGet = Item::where('id', $id)->get();
        return $response = [
            'message' => 'Item get',
            'data' => $itemsGet
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $items = Item::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama_item' => ['required'],
            'unit' => ['required'],
            'stok' => ['required', 'numeric'],
            'harga_satuan' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $items->update($request->all());
            $response = [
                'message' => 'Item updated',
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::findOrFail($id);

        try {
            $items->delete();
            $response = [
                'message' => 'Item deleted'
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'failed' . $e->errorInfo
            ]);
        }
    }
}
