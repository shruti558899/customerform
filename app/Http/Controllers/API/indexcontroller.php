<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\views\user;
use Illuminate\Http\views\userview;
use App\Models\login;

class indexcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view ('user');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|unique:login,email', // Email is required, valid, and unique in the 'logins' table
                'password' => 'required|min:8|regex:/[\/@\$&]/',
                
            ],
        [
            'email.required' => 'Please provide an email address.',
            'email.email' => 'Please use the correct mail address.',
            'email.unique' => 'This email is already registered.',
            'password.regex' => 'The password must contain at least one of the following characters: /, @, $, &.',
           ]);

            $data = new login;
            $data->name = $request['name'];
            $data->address = $request['address'];
            $data->email = $validated['email'];
            $data->password =$validated['password'];
            $data->save();
            //return view('userview');
            return response()->json([
                'result' => 'success',
                'data' => [
                    'userId' => $data->id,
                ]
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
            'result' => 'error',
            'data'=>[
            'message' => $e->validator->errors()->first('email')?:'password must atleast 8 characters including (/, @, $, &)',
            ],
        ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function viewpage()
    {
        $data = login::all();
        //dd($data);
        return view('userview', ['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, string $id)
    {
        $arry = login::find($id);
        if(!is_null($arry))
        {
            return redirect('user')->with('data','Data updated successfully');
        }
        else
        {
            return view('/user')->with('alert','id is not exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
