<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\UserProfile;
use Illuminate\Http\Request;
 use Softon\Indipay\Facades\Indipay;
class PaymentController extends Controller
{
    public function init($username)
    {
        $user = (Template::where(['username'=>$username])->first())->user->id;
        return view("user.payments.init");
    }

    public function history()
    {
        $payments = auth()->user()->payments()->paginate(10);
        return view('user.payment.history',compact('payments'));
    }
}
