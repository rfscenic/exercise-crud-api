<?php

namespace App\Http\Controllers\SQL;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CustomersSQLController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get 
        $customers = Customers::latest()->paginate(10);

        //render view 
        return view('customers.index', compact('customers'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'customer_id'       => 'required|',
            'nama_customer'     => 'required',
            'Tanggal_lahir'     => 'required|date',
            'Provinsi_alamat'   => 'required',
            'jenis_kelamin'     => 'required|in:P,L',
            'status_nikah'      => 'required',
            'gaji'              => 'required',
        ]);

        //create 
        Customers::create([
            'customer_id'       => $request->customer_id,
            'nama_customer'     => $request->nama_customer,
            'Tanggal_lahir'     => $request->Tanggal_lahir,
            'Provinsi_alamat'   => $request->Provinsi_alamat,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'status_nikah'      => $request->status_nikah,
            'gaji'              => $request->gaji,

        ]);

        //redirect to index
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get data by id
        $c = Customers::findOrFail($id);

        //render view with customers
        return view('customers.show', compact('c'));
    }

     /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get data by ID
        $c = Customers::findOrFail($id);

        //render view with customers
        return view('customers.edit', compact('c'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'customer_id'       => 'required',
            'nama_customer'     => 'required',
            'Tanggal_lahir'     => 'required|date',
            'Provinsi_alamat'   => 'required',
            'jenis_kelamin'     => 'required|in:P,L',
            'status_nikah'      => 'required',
            'gaji'              => 'required',
        ]);

        //get data by ID
        $c = Customers::findOrFail($id);

        //redirect to index
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get data by ID
        $c = Customers::findOrFail($id);

        //delete data
        $c->delete();

        //redirect to index
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
