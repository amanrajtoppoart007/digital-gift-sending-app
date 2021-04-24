<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserTemplateRequest;
use App\Http\Requests\Admin\UpdateUserTemplateRequest;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        //
    }


    public function create($userId)
    {
        $user = User::find($userId);
        $inputs = [
            [
                'id'=>'name',
                 'value'=>'name',
                'title'=>'Name'
            ],
            [
                'id'=>'email',
                 'value'=>'email',
                'title'=>'Email'
            ],
            [
                'id'=>'mobile',
                 'value'=>'mobile',
                'title'=>'Mobile'
            ],
            [
                'id'=>'company_name',
                 'value'=>'company_name',
                'title'=>'Company Name'
            ],
            [
                'id'=>'state',
                 'value'=>'state',
                'title'=>'State'
            ],
            [
                'id'=>'city',
                 'value'=>'city',
                'title'=>'City'
            ],
            [
                'id'=>'address',
                 'value'=>'address',
                'title'=>'Address'
            ],
            [
                'id'=>'pin_code',
                 'value'=>'pincode',
                'title'=>'Pin Code'
            ],
        ];
        return view('admin.template.create',compact('user','inputs'));
    }


    public function store(StoreUserTemplateRequest $request)
    {
        try {
            $user = User::find($request->input('user_id'));
            $template = $user->template()->create($request->validated());
            if ($request->input('banner_image', false))
            {
                $template->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
            }
            $url = route('admin.template.show',['username'=>$user->template->username]);
            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "Template created successfully"];
        }
        catch (\Exception $exception)
        {
            $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }

        return response()->json($result,200);

    }


    public function show($username)
    {
        $template = Template::where(['username'=>$username])->first();

        return view("admin.template.show",compact('template'));
    }


    public function edit($id)
    {
       $template = Template::find($id);
       $payment_types = [
           [
               'id'=>'payment_type_sender_detail',
               'value'=>'with_sender_detail',
               'title'=>'Sender detail required'
           ],
           [
               'id'=>'payment_type_anonymous',
               'value'=>'without_sender_detail',
               'title'=>'Anonymous sender detail not required'
           ],
       ];

       $inputs = [
            [
                'id'=>'name',
                 'value'=>'name',
                'title'=>'Name'
            ],
            [
                'id'=>'email',
                 'value'=>'email',
                'title'=>'Email'
            ],
            [
                'id'=>'mobile',
                 'value'=>'mobile',
                'title'=>'Mobile'
            ],
           [
                'id'=>'company_name',
                 'value'=>'company_name',
                'title'=>'Company Name'
            ],
            [
                'id'=>'state',
                 'value'=>'state',
                'title'=>'State'
            ],
            [
                'id'=>'city',
                 'value'=>'city',
                'title'=>'City'
            ],
            [
                'id'=>'address',
                 'value'=>'address',
                'title'=>'Address'
            ],
            [
                'id'=>'pin_code',
                 'value'=>'pincode',
                'title'=>'Pin Code'
            ],
        ];

        return view("admin.template.edit",compact('template','payment_types','inputs'));
    }


    public function update(UpdateUserTemplateRequest $request,$id)
    {
        try {
             Template::where(['id' => $id])->update($request->validated());
             $template = Template::find($id);
            if ($request->input('banner_image', false)) {
                if (!$template->banner_image || $request->input('banner_image') !== $template->banner_image->file_name) {
                    if ($template->banner_image) {
                        $template->banner_image->delete();
                    }

                    $template->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
                }
            } elseif ($template->banner_image) {
                $template->banner_image->delete();
            }
            $url = route('admin.template.show',['username'=>$template->username]);
            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "Template updated successful"];
        }
        catch (\Exception $exception)
        {
             $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result,200);
    }


    public function destroy($id)
    {
        $template = Template::find($id);
        $template->delete();
        return redirect()->back();
    }
}
