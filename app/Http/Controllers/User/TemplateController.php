<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
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
        return view('user.template.create');
    }

    /**
     * @param StoreTemplateRequest $request
     */
    public function store(StoreTemplateRequest $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $template = $user->template()->create($request->all());
            if ($request->input('banner_image', false))
            {
                $template->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
            }
            $url = route('template.show',['username'=>$user->template->username]);
            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "Template created successful"];
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

        return view("user.template.show",compact('template'));
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

        return view("user.template.edit",compact('template','payment_types'));
    }


    public function update(UpdateTemplateRequest $request,$id)
    {
        try {
             Template::where(['id' => $id])->update($request->only(['banner_title','description','payment_type']));
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
