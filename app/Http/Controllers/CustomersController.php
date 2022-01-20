<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Http\Resources\CustomersResource;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CustomersController extends Controller
{

    public function index()
    {
        $customers = Customers::paginate(10);
        return CustomersResource::collection($customers);

    }


    public function create()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $customer = new Customers();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->date = $request->date;

        if($customer->save())
        {
            return new CustomersResource($customer);
        }
    }


    public function show($id)
    {
        $customer = Customers::findOrFail($id);
        return new CustomersResource($customer);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $customer = Customers::findOrFail($id);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->date = $request->date;

        if($customer->save()){
            return new CustomersResource($customer);
        }

    }


    public function destroy($id)
    {
        $customer = Customers::findOrFail($id);
        if($customer->delete())
        {
            return new CustomersResource($customer);
        }

    }
}
