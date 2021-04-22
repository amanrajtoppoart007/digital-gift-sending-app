<?php

namespace App\Http\Controllers\Guest;
use App\Http\Controllers\Controller;
use App\Models\Template;

class TemplateController extends Controller
{

    public function show($username)
    {
        $template = Template::where(['username'=>$username])->first();

        return view("guest.template.show",compact('template'));
    }


}
