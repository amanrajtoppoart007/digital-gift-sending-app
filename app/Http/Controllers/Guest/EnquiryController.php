<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnquiryRequest;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(StoreEnquiryRequest $request,Enquiry $enquiry)
    {
            try {
                 $enquiry->create($request->all());
                 $result = ["status" => 1, "response" => "success","message" => "Thank your for contacting,we will reply shortly"];
            }
            catch (\Exception $exception)
            {
                $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
            }
          return response()->json($result,200);
    }
}
