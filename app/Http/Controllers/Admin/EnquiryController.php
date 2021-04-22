<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEnquiryRequest;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\Response;
use Gate;
class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {
       if ($request->ajax()) {
            $query = Enquiry::select(sprintf('%s.*', (new Enquiry)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'enquiries_show';
                $editGate = 'enquiries_edit';
                $deleteGate = 'enquiry_delete';
                $crudRoutePart = 'enquiries';

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
            $table->editColumn('name', function ($row) {
                $first_name = $row->first_name ? $row->first_name : "";
                $last_name = $row->last_name ? $row->last_name : "";
                return $first_name.' '.$last_name;
            });

            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('subject', function ($row) {
               return $row->subject ? $row->subject : "";
           });
            $table->editColumn('category', function ($row) {
                return $row->category ? $row->category : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });

            $table->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at : "";
            });
            $table->rawColumns(['actions', 'placeholder']);
            return $table->make(true);
        }
       return view("admin.enquiries.index");
    }

    public function show($id)
    {
        $enquiry = Enquiry::find($id);
        return view("admin.enquiries.show",compact("enquiry"));
    }

    public function destroy(Enquiry $enquiry)
    {
        abort_if(Gate::denies('enquiries_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $enquiry->delete();
        return back();
    }

    public function massDestroy(MassDestroyEnquiryRequest $request)
    {
        dd(request('ids'));
        Enquiry::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
