<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Template;
use PDF;
class PaymentController extends Controller
{
    public function init($username)
    {
        $user = (Template::where(['username'=>$username])->first())->user->id;
        return view("user.payment.init");
    }

    public function history()
    {
        $payments = auth()->user()->payments()->paginate(10);
        return view('user.payment.history',compact('payments'));
    }
    public function createPDF($id)
    {
      $payment = Payment::find($id);
      view()->share('payment',$payment);
      $pdf = PDF::loadView('user.payment.pdf', $payment);
      $invoiceName = date('YmdhiA').'-invoice.pdf';
      return $pdf->download("$invoiceName");
    }

    public function createReportPDF()
    {
        $payments = auth()->user()->payments;
        view()->share('payments', $payments);
        $pdf = PDF::loadView('user.payment.reportpdf', $payments);
        $pdf->setPaper('a4', 'landscape');
        $invoiceName = date('YmdhiA').'-payments.pdf';
        return $pdf->download("$invoiceName");
    }
}
