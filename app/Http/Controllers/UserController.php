<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('users.index', ['users' => $users]);
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
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = md5($request->password);
        $users->is_admin = $request->is_admin;
        $users->save();
        if ($users){
            return redirect()->back()->with('message', 'User Created Successfully');
        }
            # code...
        return redirect()->back()->with('message', 'User registration Failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return redirect()->back()->with('message', 'User Not Found');
        }

        $user->update($request->all());

        return redirect()->back()->with('message', 'User Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return redirect()->back()->with('message', 'User Not Found');
        }

        $user->delete();

        return redirect()->back()->with('message', 'User Deleted Successfully');
    }
}
