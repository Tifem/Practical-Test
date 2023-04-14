<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function rangeActivities(Request $request){
        try{
            $yourToken = $request->bearerToken();
            $token = \Laravel\Sanctum\PersonalAccessToken::findToken($yourToken);
            // Get the assigned user
            $user = $token->tokenable;
            $data = $request->all();

            $validator = Validator::make($data, [
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);
    
            if($validator->fails()) {
               return response()->json(['message' => $validator->errors()], 400);
           }
           $date = date('Y-m-d', strtotime($user->created_at));
           $data['activities'] = Activity::where('is_global', '=', 1)
           ->whereBetween('date', [$request->start_date, $request->end_date])
           ->orwhere(
               function($query) use ($request){
                 return $query
                        ->where('user_id', Auth::user()->id)
                        ->whereBetween('date', [$request->start_date, $request->end_date]);
                })
                ->get();
            return response ([
                "data" => $data,
            ], 201);
        }catch (\Exception $e) {
            return response ([
                "message" =>  $e->getMessage()
            ], 401);
        }
    }
}
