<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        // $todayDate = Carbon::now()->format('Y-m-d');
        // $users = User::when($request->date != null, function ($q) use ($request) {
        //     if ($request->status == 'Admin') {
        //         return $q->where('role_as', 1);
        //     } elseif ($request->status == 'User') {
        //         return $q->where('role_as', 0);
        //     } else {
        //         return $q;
        //     }
        // })->paginate(10);

        // return view('admin.users.index', compact('users'));
        $users = User::query();

        if ($request->date != null) {
            $users->whereDate('created_at', '=', $request->date);
        }

        if ($request->status == 'Admin') {
            $users->where('role_as', 1);
        } elseif ($request->status == 'User') {
            $users->where('role_as', 0);
        }

        $users = $users->paginate(10);

        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'role_as' => ['required', 'integer'],
            ]
        );
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);

        return redirect('admin/users')->with('message', 'User Added Successfully!');
    }

    public function edit(int $userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.users.edit', compact('user'));
    }

    // update
    public function update(Request $request, int $userId)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'role_as' => ['required', 'integer'],
            ]
        );
        User::findOrFail($userId)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);

        return redirect('admin/users')->with('message', 'User Updated Successfully!');
    }

    public function destroy(int $userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('admin/users')->with('message', 'User Deleted Successfully!');
    }



    public function searchUsers(Request $request)
    {
        $search = $request->input('query');
        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('admin.users.search', compact('users'));
    }
}
