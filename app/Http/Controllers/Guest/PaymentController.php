<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Template;
use Illuminate\Http\Request;
 use Softon\Indipay\Facades\Indipay;
class PaymentController extends Controller
{
    public function init($username)
    {
        $states = State::get();
        $template = Template::where(['username'=>$username])->first();
        return view("guest.payment.init",compact("template","states"));
    }
}
