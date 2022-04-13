<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomerCollection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show danh sách dữ liệu
        //$index = Customer::all();
        $index = Customer::paginate(2);
        return new CustomerCollection($index);
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
        //Thêm dữ liệu vào database
        $validated = $request->validate([
            'name_customer' => 'required',
            'email_customer' => 'required',
            'phone_customer' => 'required',
            'address_customer' => 'required',
            'city_customer' => 'required'
        ]);
        //Thêm dữ liệu vào database
        $customer = Customer::create($request->all());
        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        //Hiển thị dữ liệu chi tiết của người dùng có id = $id
        $index = Customer::where('id_customer', $customer)->first();
        return new CustomerResource($index);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer)
    {
        // $validated = $request->validate([
        //     'name_customer' => 'required',
        //     'email_customer' => 'required',
        //     'phone_customer' => 'required',
        //     'address_customer' => 'required',
        //     'city_customer' => 'required',                                                                                                          
        // ]);
        $update = Customer::find($customer);

        $edit['name_customer'] = $request->name_customer;
        $edit['email_customer'] = $request->email_customer;
        $edit['phone_customer'] = $request->phone_customer;
        $edit['address_customer'] = $request->address_customer;
        $edit['city_customer'] = $request->city_customer;

        $update->update($edit);
        return new CustomerResource($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer)
    {
        //Xóa dữ liệu
        $destroy = Customer::find($customer);
        $destroy->delete();
        return new CustomerResource($destroy);
    }
    
    public function search(Request $request){
        $keywords = $request->keyword;
        $search = Customer::where('name_customer','like','%'.$keywords.'%')->get();
        return new CustomerCollection($search);
    }
}
