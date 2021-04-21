<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\UserWelcomeMessage;
use App\Models\Area;
use App\Models\Block;
use App\Models\Crop;
use App\Models\District;
use App\Models\Pincode;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserProfile;
use App\Notifications\RegistrationSuccessSms;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = User::with(['roles'])->select(sprintf('%s.*', (new User)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'user_show';
                $editGate = 'user_edit';
                $deleteGate = 'user_delete';
                $crudRoutePart = 'users';

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
                return $row->name ? $row->name : "";
            });
            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });

            $table->editColumn('approved', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->approved ? 'checked' : null) . '>';
            });
            $table->editColumn('verified', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->verified ? 'checked' : null) . '>';
            });
            $table->editColumn('roles', function ($row) {
                $labels = [];

                foreach ($row->roles as $role) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $role->title);
                }

                return implode(' ', $labels);
            });

            $table->editColumn('referral_code', function ($row) {
                return $row->referral_code ? $row->referral_code : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'approved', 'verified', 'roles']);

            return $table->make(true);
        }

        $roles = Role::get();

        return view('admin.users.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $states = State::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact( 'states'));
    }

    public function store(StoreUserRequest $request)
    {
        try {
             $user = User::create($request->validated());
             if ($request->input('identity_proof', false))
             {
               $user->addMedia(storage_path('tmp/uploads/' . $request->input('identity_proof')))->toMediaCollection('identity_proof');
             }

             if($request->hasFile('identity_proof_other_person'))
             {
                 if ($request->input('identity_proof_other_person', false)) {
                     $user->addMedia(storage_path('tmp/uploads/' . $request->input('identity_proof_other_person')))->toMediaCollection('identity_proof_other_person');
                 }
             }


           // Mail::to($user)->send(new UserWelcomeMessage());
            /*$sms = new TextLocal();
            $sms->send(trans('sms.registration',['reg_number'=>$user->mobile]),$user->mobile,null);
            $sms->send('this is test', $user->mobile, null);*/

            $url = route("admin.users.show",$user->id);

            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "User registration successful"];
        } catch (\Exception $exception)
                {
            $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }

        return response()->json($result);
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $states = State::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.users.edit', compact('user', 'states'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('admin.users.show', $user->id);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function addProfile(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'banner' => 'required',
            'description' => 'nullable'
        ]);

        $profile = new UserProfile();
        $profile->user_id = $user->id;
        $profile->username = $request->username;
        $profile->user_id = $request->description;
        $profile->save();
        if ($request->input('banner', false)) {
            $profile->addMedia(storage_path('tmp/uploads/' . $request->input('banner')))->toMediaCollection('banner');
        }

        return redirect()->route('admin.users.show', $user->id);
    }
}
