<?php

namespace App\Http\Controllers;

use App\Business;
use App\Traits\ResponserTraits;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    use ResponserTraits;
    //
    public function search(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->error_message(Response::HTTP_BAD_REQUEST, 'error', 'Bad Request', null);
        }

        $keyword = strtolower(implode(",", $request->all()));

        $search = ["lower(concat(name, address)) like '%$keyword%'",
            "lower(concat(address, name))",
            "lower(name)",
            "lower(address)"
        ];

        $select = [
            "businesses.name",
            "businesses.description",
            "reviews.review",
            "achievements.achievement",
            "contacts.email",
            "contacts.phone_number",
            "contacts.address"
        ];

        $search = implode("OR", $search);
        $select = implode(",", $select);

        $search_results = DB::table('businesses')
            ->selectRaw($select)
            ->whereRaw($search)
            ->join('contacts')

    }


//    public function search(Request $request)
//    {
//        $keyword = strtolower($request->keyword);
//        $keyword = str_replace(' ', '', $keyword);
//        $results = [];
//
//        $search = [
//            "lower(concat(first_name, COALESCE(`middle_name`,''), last_name)) like '%$keyword%'",
//            "lower(concat(last_name, COALESCE(`middle_name`,''), first_name)) like '%$keyword%'",
//            "lower(concat(last_name, first_name)) like '%$keyword%'",
//            "lower(concat(first_name, last_name)) like '%$keyword%'",
//            "lower(email) like '%$keyword%'",
//            "lower(phone) like '%$keyword%'"
//        ];
//
//        $search = implode(" OR ", $search);
//
//        $select = [
//            "clients.id",
//            "concat(first_name, ' ', COALESCE(CONCAT(`middle_name`, ' '),''), last_name, ' (', email, ' | ', phone, ')') as text"
//        ];
//
//        $select = implode(',', $select);
//
//        $results = Client::distinct()
//            ->selectRaw($select)
//            ->whereRaw($search)
//            ->join('activation_clients', function ($activation) {
//                return $activation->on('activation_clients.client_id', '=', 'clients.id')
//                    ->where(function ($query) {
//                        $query->whereNotNull('activation_clients.activated_at')
//                            ->orWhereNotNull('activation_clients.alternate_activation_at');
//                    });
//            })
//            ->paginate(10)
//            ->toArray();
//
//        return response()->json($results);
//    }
}
