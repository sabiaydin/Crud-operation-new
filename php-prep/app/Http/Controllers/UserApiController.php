<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users=User::all();
       return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
           'name'=>'required',
           'email'=>'required',
           'password'=>'required|min:8'
       ]);
       $users=User::create($validate);
        return response()->json($users,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $users=User::findOrFail($id);
        return response()->json($users,201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validate = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:8'
        ]);

        $user = User::findOrFail($id);
        $user->update($validate);
        return response()->json($user,201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
      User::destroy($id);
        return response()->json(null,204);
    }
}
