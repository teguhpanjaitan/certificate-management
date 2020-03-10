<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function index()
    {
        $accounts = User::all();
        return view('pages.account.all', ['role' => 'admin', 'accounts' => $accounts]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            // $this->validate($request, [
            //     'title'    => 'required|max:255|unique:posts|string'
            // ]);

            User::create([
                'user_role' => $request->role,
                'login_id' => $request->loginid,
                'password' => Hash::make($request->inputPassword3),
                'name' => $request->fullname,
                'email' => $request->inputEmail3,
                'remarks' => $request->remarks,
                'updated_by' => '1'
            ]);

            return redirect(route('account.all'));
        } else {
            return view('pages.account.add');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.account.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = [
                'user_role' => $request->role,
                'login_id' => $request->loginid,
                'name' => $request->fullname,
                'email' => $request->inputEmail3,
                'remarks' => $request->remarks,
                'updated_by' => '1'
            ];

            if (!empty($request->inputPassword3)) {
                $data['password'] = Hash::make($request->inputPassword3);
            }

            User::where('id', $request->id)->update($data);
        }

        return redirect(route('account.all'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect(route('account.all'));
    }

    public function lock($id,$value)
    {
        User::where('id', $id)->update([
            'locked' => $value,
            'updated_by' => '1'
        ]);

        return redirect(route('account.all'));
    }
}
