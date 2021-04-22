<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Models\UserAlert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Message::query();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', function ($row){
                return "<button data-id='{$row->id}' class='btn btn-info'>Edit</button>";
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->editColumn('actions', function ($row) {
                return "<button data-id='{$row->id}' class='btn btn-xs btn-info editButton'>Edit</button>";
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }
        $users = User::all()->pluck('name', 'id');
        return view('admin.messages.index', compact('users'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'message' => 'required'
        ]);
        $message = new Message();
        $message->type = $request->type;
        $message->message= $request->message;
        if($message->save()){
            $result = array('status'=> true, 'msg'=>'Message added successfully.');
        }else{
            $result = array('status'=>false, 'msg'=>'Something went wrong!!');
        }
        return json_encode($result);
    }

    public function edit(Request $request)
    {
        $message = Message::find($request->id);
        if($message){
            $result = array('status'=> true, 'msg'=>'Message fetched successfully.', 'data' => $message);
        }else{
            $result = array('status'=>false, 'msg'=>'Message not found');
        }
        return json_encode($result);
    }


    public function update(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'message' => 'required'
        ]);
        $message = Message::find($request->id);
        $message->type = $request->type;
        $message->message= $request->message;
        if($message->save()){
            $result = array('status'=> true, 'msg'=>'Message updated successfully.');
        }else{
            $result = array('status'=>false, 'msg'=>'Something went wrong!!');
        }
        return json_encode($result);
    }
}
