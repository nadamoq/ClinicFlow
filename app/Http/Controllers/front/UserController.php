<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Supervisor;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        //
        $users = User::query();
        if ($request->query('role')) {
            $users->where('role', $request->query('role'));
        }
      
        $users = $users->paginate(10);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $supervisors = Supervisor::all();

        return view('users.create', ['supervisors' => $supervisors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = UserService::store($request);
        return redirect()->route('dashboard.users.index')->with('user created successfully');
    }
    public function show(User $user)
    {
        //
        $viewPath = "profiles." . strtolower($user->role);
        return view($viewPath, compact('user'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->back()->with('success', 'user deleted successfuly');
    }
}
