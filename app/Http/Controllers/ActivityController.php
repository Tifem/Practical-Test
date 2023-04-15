<?php

namespace App\Http\Controllers;
use function App\Helpers\api_request_response;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;
use App\Models\Activity;
use Auth;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request){
        $data['activities'] = Activity::all();
        return view('activities_home', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        try{
        $extensions = [
            'jpg' => 'jpeg.png',
            'png' => 'png.png',
            'pdf' => 'pdfdocument.png',
            'doc' => 'wordicon.jpg',
        ];


        $input = $request->all();

        
            $DAinput["image"] = $imageName = time() . '.' . $request->image->extension();
            // dd('here');
            $request->image->move(public_path('file'), $imageName);

        $input['image'] = $imageName;
        $input['user_id'] = Auth::user()->id;
        $user = Activity::create($input);
        return redirect()->back()->with('message', 'Activity created successfully');

    } catch (\Exception $exception) {

        return redirect()->back()->withErrors(['exception' => $exception->getMessage()]);
    }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request)
    {
        $user = Activity::where('id', $request->id)->first();

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function updateActivity(Request $request)
    { 
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $activity = Activity::find($id);
        // dd($customer);
        $activity->delete();

        return redirect()->back()->with('message', 'Activity deleted successfully');
    }
    
}
