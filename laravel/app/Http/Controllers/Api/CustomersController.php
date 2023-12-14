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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customers::orderBy('customer_id')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataCustomers = new Customers;

        $rules = [
            'customer_id'       => 'required|unique:customers',
            'nama_customer'     => 'required',
            'Tanggal_lahir'     => 'required|date',
            'Provinsi_alamat'   => 'required',
            'jenis_kelamin'     => 'required|in:P,L',
            'status_nikah'      => 'required|in:Kawin, Belum Kawin, Janda/Duda',
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

        $dataCustomers->customer_id     = $request->customer_id;
        $dataCustomers->nama_customer   = $request->nama_customer;
        $dataCustomers->Tanggal_lahir   = $request->Tanggal_lahir;
        $dataCustomers->Provinsi_alamat = $request->Provinsi_alamat;
        $dataCustomers->jenis_kelamin   = $request->jenis_kelamin;
        $dataCustomers->status_nikah    = $request->status_nikah;
        $dataCustomers->gaji            = $request->gaji;

        $post = $dataCustomers->save();

        return response()->json([
            'status'=>true,
            'message'=>'Berhasil memasukkan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customer_id)
    {
        $data = Customers::find($customer_id);
        if($data){
            return response()->json([
                'status'=>true,
                'message'=>'Data ditemukan',
                'data'=>$data
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
    public function update(Request $request, Customers $customer_id)
    {
        $dataCustomers = Customers::find($customer_id);
        if(empty($dataCustomers)){
            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'customer_id'       => 'required|unique:customers',
            'nama_customer'     => 'required',
            'Tanggal_lahir'     => 'required|date',
            'Provinsi_alamat'   => 'required',
            'jenis_kelamin'     => 'required|in:P,L',
            'status_nikah'      => 'required|in:Kawin, Belum Kawin, Janda/Duda',
            'gaji'              => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal melakukan update data',
                'data' => $validator->errors()
            ]);
        }

        $dataCustomers->customer_id     = $request->customer_id;
        $dataCustomers->nama_customer   = $request->nama_customer;
        $dataCustomers->Tanggal_lahir   = $request->Tanggal_lahir;
        $dataCustomers->Provinsi_alamat = $request->Provinsi_alamat;
        $dataCustomers->jenis_kelamin   = $request->jenis_kelamin;
        $dataCustomers->status_nikah    = $request->status_nikah;
        $dataCustomers->gaji            = $request->gaji;

        $post = $dataCustomers->save();

        return response()->json([
            'status'=>true,
            'message'=>'Berhasil melakukan update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customers $customer_id)
    {
        $dataCustomers = Customers::find($customer_id);
        if(empty($dataCustomers)){
            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataCustomers->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Berhasil menghapus data'
        ]);
    }
}
