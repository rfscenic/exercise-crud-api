<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Nette\Utils\Strings;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    /* ==================================================================
                                                API
    ==================================================================
     */


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $c = Customers::orderBy('customer_id', 'asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$c
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $c = new Customers;

        $rules = [
            'customer_id'       => 'required',
            'nama_customer'     => 'required',
            'Tanggal_lahir'     => 'required|date',
            'Provinsi_alamat'   => 'required',
            'jenis_kelamin'     => 'required|in:P,L',
            'status_nikah'      => 'required',
            'gaji'              => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }

        $c->customer_id     = $request->customer_id;
        $c->nama_customer   = $request->nama_customer;
        $c->Tanggal_lahir   = $request->Tanggal_lahir;
        $c->Provinsi_alamat = $request->Provinsi_alamat;
        $c->jenis_kelamin   = $request->jenis_kelamin;
        $c->status_nikah    = $request->status_nikah;
        $c->gaji            = $request->gaji;

        $post = $c->save();

        return response()->json([
            'status'=>true,
            'message'=>'Berhasil memasukkan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $c = Customers::find($id);
        if($c){
            return response()->json([
                'status'=>true,
                'message'=>'Data ditemukan',
                'data'=>$c
            ], 200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $c = Customers::find($id);

        if(empty($c)){
            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'customer_id'       => 'required',
            'nama_customer'     => 'required',
            'Tanggal_lahir'     => 'required|date',
            'Provinsi_alamat'   => 'required',
            'jenis_kelamin'     => 'required|in:P,L',
            'status_nikah'      => 'required',
            'gaji'              => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal melakukan update data',
                'data' => $validator->errors()
            ]);
        }

        // $c->update([
        //     'customer_id'     => $request->customer_id,
        //     'nama_customer'   => $request->nama_customer,
        //     'Tanggal_lahir'   => $request->Tanggal_lahir,
        //     'Provinsi_alamat' => $request->Provinsi_alamat,
        //     'jenis_kelamin'   => $request->jenis_kelamin,
        //     'status_nikah'    => $request->status_nikah,
        //     'gaji'            => $request->gaji,
        // ]);

        if($request->customer_id){
            $c->update([
                'customer_id'     => $request->customer_id,
                'nama_customer'   => $request->nama_customer,
                'Tanggal_lahir'   => $request->Tanggal_lahir,
                'Provinsi_alamat' => $request->Provinsi_alamat,
                'jenis_kelamin'   => $request->jenis_kelamin,
                'status_nikah'    => $request->status_nikah,
                'gaji'            => $request->gaji,
            ]);
        }else{
            $c->update([
                // 'customer_id'     => $request->customer_id,
                'nama_customer'   => $request->nama_customer,
                'Tanggal_lahir'   => $request->Tanggal_lahir,
                'Provinsi_alamat' => $request->Provinsi_alamat,
                'jenis_kelamin'   => $request->jenis_kelamin,
                'status_nikah'    => $request->status_nikah,
                'gaji'            => $request->gaji,
            ]);
        }

        $post = $c->save();

        return response()->json([
            'status'=>true,
            'message'=>'Berhasil melakukan update data',
            'data' =>$c
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $c = Customers::find($id);
        if(empty($c)){
            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $c->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Berhasil menghapus data'
        ]);
    }
}
