<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
       if ($request->ajax()) {
            $query = Payment::with(['user'])->select(sprintf('%s.*', (new Payment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'payments_show';
                $editGate = 'payments_edit';
                $deleteGate = 'payments_delete';
                $crudRoutePart = 'payments';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('txn_number', function ($row) {
                return $row->txn_number ? $row->txn_number : "";
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('address', function ($row) {
               return $row->address ? $row->address : "";
           });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : "";
            });
            $table->editColumn('pin_code', function ($row) {
                return $row->pin_code ? $row->pin_code : "";
            });
            $table->editColumn('payment_type', function ($row) {
                return $row->payment_type ? $row->payment_type : "";
            });
            $table->editColumn('payment_status', function ($row) {
                return $row->payment_status ? $row->payment_status : "";
            });
            $table->rawColumns(['actions', 'placeholder']);
            return $table->make(true);
        }
       return view("admin.payments.index");
    }

    public function show($id)
    {
        $payment = Payment::with(['transaction'])->find($id);
        return view("admin.payments.show",compact("payment"));
    }
}
