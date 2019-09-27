<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Business;
use App\Category;
use App\Contact;
use App\Traits\ResponserTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{

    use ResponserTraits;

    /**
     * @return \Illuminate\Http\JsonResponse
     * Get all businesses and their related information
     */

    public function index()
    {
        $businesses = Business::all();

        return $this->createArray($businesses);

    }


    /**
     * Get all businesses in a particular category and related information.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBusinessesByCategory($id)
    {
        $businesses = Category::find($id)->business;

        return $this->createArray($businesses, $id);

    }


    /**
     * Create a business
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBusiness(Request $request)
    {
        $this->validateRequest($request);

        try {
            DB::transaction(function () use ($request) {
                $business = $this->saveBusiness($request);
                $this->saveContact($request, $business->id);
                $this->saveAchievement($request, $business->id);
            });

            return $this->success('200', 'success', 'Business successfully created', null);

        } catch (\Exception $e) {
            report($e);
            return $this->error_message($e->getCode(), 'error', $e->getMessage(), null);
        }
    }

    public function updateBusiness(Request $request, $id){
        $business = Business::find($id);

        $business->update([
            'name' => $request->name
        ]);
        $business->contact()->update([
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        $business->achievement()->update([
            'achievement' => $request->achievement
        ]);
    }


    public function delete(){
        //Haven't decided if business can be deleted
    }

    public function search(){

    }

    /**
     * Create response structure
     * @param Business $businesses
     * @param bool $isCategory
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    private function createArray($businesses, $categoryId = false){
        $data = [];

        foreach ($businesses as $business) {
            $structure = [
                'id' => $business->id,
                'name' => $business->name,
                'description' => $business->description,
                'wins' => $business->achievement->first()->achievement ?? null,
                'reviews' => count($business->review),
                'address' => $business->contact->address,
                'phone' => $business->contact->phone,
                'email' => $business->contact->email
            ];

            array_push($data, $structure);
        }
        if ($categoryId) {
            $data['category'] = Category::find($categoryId)->name;
        }

        return $this->success(200, 'success', 'All businesses in this category fetched successfully', $data);
    }

    /**
     * Save a business in the businesses table
     * @param Request $request
     * @return Business
     */
    public function saveBusiness(Request $request): Business{
        return Business::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    /**
     * Save a contact in the contact table
     * @param Request $request
     * @param Business $business
     * @return mixed
     */
    public function saveContact(Request $request, $business_id){
        return Contact::create([
            'business_id' => $business_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

    }

    /**
     * Save an achievement in the achievement table
     * @param Request $request
     * @param Business $business
     * @return mixed
     */
    public function saveAchievement(Request $request, $business_id){
        return Achievement::create([
            'business_id' => $business_id,
            'achievement' => $request->achievement
        ]);
    }

    private function validateRequest(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required|unique',
            'address' => 'required',
            'achievement' => 'sometimes'
        ]);

        if ($validator->fails()) {
            return $this->error_message(404, 'error', 'Bad Request', $validator->errors());
        }
    }

}
