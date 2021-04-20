<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
 use Softon\Indipay\Facades\Indipay;
class PaymentController extends Controller
{
    public function init($username)
    {
        $user = (Template::where(['username'=>$username])->first())->user->id;
        return view("user.payment.init");
    }
}
