<?php


namespace App\Http\Controllers\Api\V1\User;

use App\Models\Area;
use App\Models\Block;
use App\Models\District;
use App\Models\Pincode;
use App\Models\State;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends \App\Http\Controllers\Api\BaseController
{
    public function getProfileDetails()
    {
        $data = auth()->user();
        if (!empty($data)) {
            return $this->sendResponse('success', $data, 'Profile data fetched successfully.');
        } else {
            return $this->sendResponse('failed', [], 'Profile not found.');
        }
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'mobile' => 'required|unique:users,mobile,' . auth()->user()->id,
            'email' => 'unique:users,email,' . auth()->user()->id,
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse('failed', [],'Validation Error.');
        }
        $input = $request->json()->all();

        $user = auth()->user();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->mobile = $input['mobile'];
        if ($user->save()) {
            return $this->sendResponse('success', $user, 'Profile updated successfully.');
        } else {
            return $this->sendResponse('failed', [], 'Something went wrong!');
        }
    }

    public function getStates(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'keyword' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('failed', $validator->errors(), 'Validation Error.');
        }
        $input = $request->json()->all();
        $query = State::query();
        if (isset($input['keyword'])) {
            $query->where(function ($q) use ($input) {
                $q->where('name', 'LIKE', "%" . $input['keyword'] . "%");
            });
        }

        $states = $query->select('id', 'name')->whereStatus(true)->get()->toArray();
        if ($states) {
            return $this->sendResponse('success', $states, 'States found..');
        }
        return $this->sendResponse('failed', [], 'No state found!');
    }

    public function getDistricts(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'keyword' => 'nullable',
            'state_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse('failed', $validator->errors(), 'Validation Error.');
        }
        $input = $request->json()->all();
        $query = District::query();
        if (isset($input['keyword'])) {
            $query->where(function ($q) use ($input) {
                $q->where('name', 'LIKE', "%" . $input['keyword'] . "%");
            });
        }
        if (isset($input['state_id'])) {
            $query->where('state_id', $input['state_id']);
        }

        $districts = $query->select('id', 'name')->whereStatus(true)->get()->toArray();
        if ($districts) {
            return $this->sendResponse('success', $districts, 'Districts found.');
        }
        return $this->sendResponse('failed', [], 'No District found!');
    }

    public function getBlocks(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'keyword' => 'nullable',
            'district_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse('failed', $validator->errors(),'Validation Error.');
        }
        $input = $request->json()->all();
        $query = Block::query();
        if (isset($input['keyword'])) {
            $query->where(function ($q) use ($input) {
                $q->where('name', 'LIKE', "%" . $input['keyword'] . "%");
            });
        }
        if (isset($input['district_id'])) {
            $query->where('district_id', $input['district_id']);
        }

        $blocks = $query->select('id', 'name')->whereStatus(true)->get()->toArray();
        if ($blocks) {
            return $this->sendResponse('success', $blocks, 'Blocks found..');
        }
        return $this->sendResponse('failed', [], 'No Block found!');
    }

    public function getPincodes(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'keyword' => 'nullable',
            'block_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse('failed', $validator->errors(),'Validation Error.');
        }
        $input = $request->json()->all();
        $query = Pincode::query();
        if (isset($input['keyword'])) {
            $query->where(function ($q) use ($input) {
                $q->where('pincode', 'LIKE', "%" . $input['keyword'] . "%");
            });
        }
        if (isset($input['block_id'])) {
            $query->where('block_id', $input['block_id']);
        }

        $pincodes = $query->select('id', 'pincode')->whereStatus(true)->get()->toArray();
        if ($pincodes) {
            return $this->sendResponse('success', $pincodes, 'Pincodes found.');
        }
        return $this->sendResponse('failed', [], 'No pincode found!');
    }

    public function getAreas(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'keyword' => 'nullable',
            'pincode_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse('failed', $validator->errors(),'Validation Error.');
        }
        $input = $request->json()->all();
        $query = Area::query();
        if (isset($input['keyword'])) {
            $query->where(function ($q) use ($input) {
                $q->where('area', 'LIKE', "%" . $input['keyword'] . "%");
            });
        }
        if (isset($input['pincode_id'])) {
            $query->where('pincode_id', $input['pincode_id']);
        }

        $areas = $query->select('id', 'area')->whereStatus(true)->get()->toArray();
        if ($areas) {
            return $this->sendResponse('success', $areas, 'Areas found.');
        }
        return $this->sendResponse('failed', [], 'No area found!');
    }

    public function getAddressTypes()
    {
        $addressTypes = [];
        foreach (UserAddress::ADDRESS_TYPE_RADIO as $key => $value){
            $addressTypes[] = [
                'name' => $value,
                'value' => $key
            ];
        }
        if ($addressTypes) {
            return $this->sendResponse('success', $addressTypes, 'Address Types found..');
        }
        return $this->sendResponse('failed', [], 'No address type found!');
    }

    public function addAddress(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'address' => 'nullable',
            'address_type' => 'nullable',
            'street' => 'nullable',
            'address_line_two' => 'nullable',
            'pincode' => 'nullable',
            'state_id' => 'required',
            'district_id' => 'required',
            'block_id' => 'required',
            'pincode_id' => 'nullable',
            'area_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse('failed', $validator->errors(),'Validation Error.');
        }
        $input = $request->json()->all();

        $address = new UserAddress();

        $address->user_id = auth()->user()->id;
        $address->address = $input['address'];
        $address->address_type = $input['address_type'];
        $address->street = $input['street'];
        $address->address_line_two = $input['address_line_two'];
        $address->pincode = $input['pincode'];
        $address->state_id = $input['state_id'];
        $address->district_id = $input['district_id'];
        $address->block_id = $input['block_id'];
        $address->pincode_id = $input['pincode_id'];
        $address->area_id = $input['area_id'];

        if ($address->save()) {
            return $this->sendResponse('success', $address, 'Address added successfully.');
        } else {
            return $this->sendResponse('failed', [], 'Something went wrong code!');
        }
    }

    public function updateAddress(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'address_id' => 'required',
            'address' => 'nullable',
            'address_type' => 'nullable',
            'street' => 'nullable',
            'address_line_two' => 'nullable',
            'pincode' => 'nullable',
            'state_id' => 'required',
            'district_id' => 'required',
            'block_id' => 'required',
            'pincode_id' => 'nullable',
            'area_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse('failed',[], 'Validation Error.');
        }
        $input = $request->json()->all();
        $address = UserAddress::find($input['address_id']);
        if($address){
            $address->address = $input['address'];
            $address->address_type = $input['address_type'];
            $address->street = $input['street'];
            $address->address_line_two = $input['address_line_two'];
            $address->pincode = $input['pincode'];
            $address->state_id = $input['state_id'];
            $address->district_id = $input['district_id'];
            $address->block_id = $input['block_id'];
            $address->pincode_id = $input['pincode_id'];
            $address->area_id = $input['area_id'];

            if ($address->save()) {
                return $this->sendResponse('success', $address, 'Address updated successfully.');
            } else {
                return $this->sendResponse('failed', [], 'Something went wrong!');
            }
        }
        return $this->sendResponse('failed', [], 'Address not found!');
    }

    public function getAddresses()
    {
        $addresses = UserAddress::where('user_id', auth()->user()->id)->get();

        if ($addresses) {
            return $this->sendResponse('success', $addresses, 'Addresses found..');
        }
        return $this->sendResponse('failed', [], 'Sorry no address found!');
    }
}
