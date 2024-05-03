<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\form;
use Illuminate\Support\Facades\Redirect;

class formcontroller extends Controller
{
    // public function createuserform(){
    //     return view ('form');
    // }

    public function index(){
        $form = form::all();
        return view('index', compact('form'));
    
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $storedata = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            // 'dob' => 'required|numeric',
        ]);

            $form = form::create($storedata);
            return redirect('/form')->with('completed', 'User data has been saved!');
    }

    public function showinfo($id){

    }

    public function edit($id){
        $form = form::findOrFail($id);
        return view('edit', compact('form'));
    }

    public function update(Request $request, $id){
        $updateData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'phone' => 'required|numeric',
        // 'dob' => 'required|numeric',
        ]);

        form::whereId($id)->update($updateData);
        return redirect('/form')->with('completed', 'User data has been updated!');
    }

    public function deletedata($id){
        $form = form::findOrFail($id);
        $form->delete();
        return Redirect('/form')->with('completed', 'User has been deleted');
    }
}
