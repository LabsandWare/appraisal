<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supervisor;
use Auth;


class SupervisorCtrl extends Controller
{

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supervisors = Supervisor::all();
        return response()->json(['status' => 'success','result' => $supervisors]);
    }

    /**
     * Create a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
          'lname' => 'required',
          'fname' => 'required',
          'email' => 'required'
        ]);
        
        $name = $request->input('fname') . ' ' . $request->input('lname');

        $supervisor = new Supervisor([
            'name' => $name,
            'email' => $request->input('email'),
          ]);


        $supervisor->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'Added successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supervisor = Supervisor::where('id', $id)->get();
        return response()->json($supervisor);
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'filled',
          'email' => 'filled'
        ]);

        $supervisor = Supervisor::find($id);
        if($supervisor->fill($request->all())->save()){
           return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'failed']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Supervisor::destroy($id)){
             return response()->json(['status' => 'success']);
        }
    }
  
}
