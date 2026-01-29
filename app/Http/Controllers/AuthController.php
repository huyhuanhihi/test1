<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function SignIn(){
        return View('Auth.SignIn');
    }

    public function checkSignIn(Request $request)
    {
        $name = "HuanNH";
        $mssv = "0170667";
        $lopmonhoc = "67IT1";
        $gioitinh = "Nam";

        if($request->input('username') == $name 
            && $request->input('mssv')== $mssv
            && $request->input('lopmonhoc')== $lopmonhoc
            && $request->input('gioitinh')== $gioitinh
            && $request->input('password')==$request->input('repass'))
        {
            $data = [
                'status' => 'success',
                'message' => 'Dang ky thanh cong',
                'username'=> $request->input('username'),
                'mssv' => $request->input('mssv'),
                'pass' => $request->input('password'),
                'repass' => $request->input('repass'),
                'lopmonhoc' => $request->input('lopmonhoc'),
                'gioitinh'=>$request->input('gioitinh'),
                
            ];
            return response()->json($data);
        }else{
            $data = [
                'status' => 'success',
                'message' => 'Dang ky thanh cong',
                'username'=> $request->input('username'),
                'mssv' => $request->input('mssv'),
                'pass' => $request->input('password'),
                'repass' => $request->input('repass'),
                'lopmonhoc' => $request->input('lopmonhoc'),
                'gioitinh'=>$request->input('gioitinh'),
                
            ];
            return response()->json($data);
        }
            

    } 
        
    
}
