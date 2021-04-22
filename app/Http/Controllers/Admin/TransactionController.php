<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
       if ($request->ajax()) {
            $query = Transaction::with(['payment'])->select(sprintf('%s.*', (new Transaction)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'transactions_show';
                $editGate = 'transactions_edit';
                $deleteGate = 'transactions_delete';
                $crudRoutePart = 'transactions';

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
            $table->editColumn('txnid', function ($row) {
                return $row->txnid ? $row->txnid : "";
            });
             $table->editColumn('net_amount_debit', function ($row) {
                return $row->net_amount_debit ? $row->net_amount_debit : "";
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });
            $table->editColumn('firstname', function ($row) {
                return $row->firstname ? $row->firstname : "";
            });
            $table->editColumn('productinfo', function ($row) {
                return $row->productinfo ? $row->productinfo : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('mode', function ($row) {
                return $row->mode ? $row->mode : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : "";
            });
            $table->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at : "";
            });
            $table->rawColumns(['actions', 'placeholder']);
            return $table->make(true);
        }
       return view("admin.transactions.index");
    }

    public function show($id)
    {
        $transaction = Transaction::with(['payment'])->find($id);
        return view("admin.transactions.show",compact("transaction"));
    }
}
