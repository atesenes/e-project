<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{

    public function index()
    {
        $data['customers'] = Customers::all();
        return view('index' ,$data);

    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'mobile' => ['required'],
            'date' => ['required'],

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'date' => $request->date,

        ];
        if (Customers::create($data))
        {
            return response()->json(["message" => "success"]);
        }else
        {
            return response()->json(["message" => "Failed"]);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data['customers'] = Customers::find($id);
        return view('update', $data);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'mobile' => ['required'],
            'date' =>['required'],

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'date' =>$request->date,
        ];
        if (Customers::find($id)->update($data))
        {
            return response()->json(["message" => "success"]);
        }else
        {
            return response()->json(["message" => "Failed"]);
        }
    }


    public function destroy($id)
    {
        if (Customers::find($id)->delete())
        {
            return response()->json(["message" => "success"]);
        }else
        {
            return response()->json(["message" => "Failed"]);
        }
    }
}
