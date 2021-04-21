<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('user.profile.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
         return view('user.profile.show');
    }


    public function edit($id)
    {
        return view('user.profile.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
