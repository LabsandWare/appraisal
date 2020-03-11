<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Employee;
use Auth;


class EmployeeCtrl extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employee = Employee::get();
        return response()->json(['status' => 'success','result' => $employee]);
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
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required'
          ]);

          $uuid = (string) Str::uuid();
  
          $employee = new Employee([
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'uuid' => $uuid,
              'supervisor_id' => $request->input('supervisor_id')
            ]);
  
  
          $employee->save();
  
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
        $employee = Employee::where('id', $id)->get();
        return response()->json($employee);
        
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

        $employee = Employee::find($id);
        if($employee->fill($request->all())->save()){
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
        if(Employee::destroy($id)){
             return response()->json(['status' => 'success']);
        }
    }
  
}
