<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        if (!Gate::authorize('manage-users')) {
            abort(403);
        }

        $users =  User::paginate(5);


        return view('admin.users.index', ['users' => $users]);
    }

    /**
     *  @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        if (!Gate::authorize('manage-users')) {
            abort(403);
        }

        $user = User::find($request->user);
        $user->delete();
        return redirect()->route('admin');
    }
}
