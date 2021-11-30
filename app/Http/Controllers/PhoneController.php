<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class PhoneController extends Controller
{
    public function show(Request $request){
        if ($request->session()->exists('id')) {
            $phones = Phone::orderBy('created_at', 'desc')->where('user_id',$request->session()->get('id'))->simplePaginate(8);
            $user_id = $request->session()->get('id');
            $user_name = User::where('id',$user_id)->first()->name;

            return view('contacts', [
                'phones' => $phones,
                'user_name' => $user_name
            ]);   
        } else {
            return redirect('/loginform');
        }
    }

    public function add(Request $request)
    {
        if ($request->session()->missing('id')) {
            return redirect('/loginform');
        }

        $user_id = $request->session()->get('id');

        $request->validate([
            'name' => [
                'required',
                Rule::unique('phones')->where('user_id', $user_id),
                'max:255'],
            'role' => 'required',
            'phones' => 'required|size:11'
        ]);


        $phone = new Phone;
        $phone->name = $request->name;
        $phone->phone_numbers = $request->phones;
        $phone->role = $request->role;
        $phone->user_id = $user_id;
        $phone->save();

        return redirect('/contacts');
    }

    public function delete($id)
    {
        if (Session::missing('id')) {
            return redirect('/loginform');
        }

        Phone::where('user_id',Session::get('id'))->findOrFail($id)->delete();
        return redirect('/');
    }

    public function displayEditForm($id){
        if (Session::missing('id')) {
            return redirect('/loginform');
        }

        $phones = Phone::orderBy('created_at', 'asc')->where('id',$id)->get();

        return view('editphoneform', [
            'phones' => $phones
        ]);
    }

    public function edit(Request $request)
    {
        if ($request->session()->missing('id')) {
            return redirect('/loginform');
        }

        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required',
            'phones' => 'required|size:11',
        ]);


        $phones = Phone::where('id',$request->id)->update([
            'name' => $request->name, 
            "phone_numbers"=>$request->phones, 
            "role" => $request->role]
        );

        return redirect('/contacts');
    }
}
