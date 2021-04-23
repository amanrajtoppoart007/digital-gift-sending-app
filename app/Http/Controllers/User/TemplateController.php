<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\State;
use App\Models\Template;
use App\Models\User;

class TemplateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
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

        return view('user.template.create',compact('inputs'));
    }

    /**
     * @param StoreTemplateRequest $request
     */
    public function store(StoreTemplateRequest $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $template = $user->template()->create($request->validated());
            if ($request->input('banner_image', false))
            {
                $template->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
            }
            $url = route('template.show',['username'=>$user->template->username]);
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
        $states = State::get();
        return view("user.template.show",compact('template','states'));
    }


    public function edit($id)
    {
       $template = Template::find($id);
       $payment_types = [
           [
               'id'=>'payment_type_sender_detail',
               'value'=>'with_sender_detail',
               'title'=>'With Sender Detail'
           ],
           [
               'id'=>'payment_type_anonymous',
               'value'=>'without_sender_detail',
               'title'=>'Without Sender Detail'
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

        return view("user.template.edit",compact('template','payment_types','inputs'));
    }


    public function update(UpdateTemplateRequest $request,$id)
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
            $url = route('template.show',['username'=>$template->username]);
            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "Template updated successful"];
        }
        catch (\Exception $exception)
        {
             $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
