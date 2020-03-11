<?php

  namespace App\Http\Controllers;
  use Illuminate\Http\Request;
  use Illuminate\Support\Str;
  use App\Models\Employee;
  use Auth;


  class SendEmailCtrl implements Controllers {

    public function multiplemail(Request $request)
    {
      Mail()::to();
    }
  }