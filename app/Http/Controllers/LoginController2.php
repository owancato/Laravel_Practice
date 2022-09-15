<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class LoginController2 extends Controller
{
    //
    public function show()
    {
        return View::make('login2.login2_0');
    }

//...
/**
* @OA\Post(
*      path="/api/login2",
*      operationId="login",
*      tags={"Login"},
*      summary="登入",
*      description="登入",
*      @OA\Parameter(
*          name="email",
*          description="信箱",
*          required=true,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Parameter(
*          name="password",
*          description="密碼",
*          required=true,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Response(
*          response=200,
*          description="成功登入",
*          @OA\JsonContent(
*          type="object", 
*           @OA\Property(property="status", type="string",description="狀態",example="success"),
*           @OA\Property(property="code", type="integer",description="狀態碼",example="200"),
*           @OA\Property(property="message", type="string",description="回傳說明",example="成功登入"),
*           ),

*       ),
*      @OA\Response(
*          response=400,
*          description="信箱or密碼錯誤",
*          @OA\JsonContent(
*          type="object", 
*           @OA\Property(property="status", type="string",description="狀態",example="fail"),
*           @OA\Property(property="code", type="integer",description="狀態碼",example="400"),
*           @OA\Property(property="message", type="string",description="回傳說明",example="信箱or密碼錯誤"),
*           ),
*       ),
*      @OA\Response(
*          response=401,
*          description="信箱或密碼不符合格式",
*          @OA\JsonContent(
*          type="object", 
*           @OA\Property(property="status", type="string",description="狀態",example="fail"),
*           @OA\Property(property="code", type="integer",description="狀態碼",example="401"),
*           @OA\Property(property="message", type="string",description="回傳說明",example="信箱或密碼不符合格式"),
*           ),
*       )
* )
* Login
*/

    public function login(Request $request)
    {
        $data = $request->all();
        $v = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if ($v->passes()){
            $attempt = Auth::attempt([
                'email' => $data['email'],
                'password' => $data['password']
            ]);
    
            if ($attempt) {
                $data["status"] = "success";
                $data["code"] = 200;
                $data["message"] = "成功登入";

                return response()->json($data, 200)->header('Access-Control-Allow-Origin', '*');
            }
            $data["status"] = "failed";
            $data["code"] = 400;
            $data["message"] = "信箱or密碼錯誤";
            return response()->json($data, 400)->header('Access-Control-Allow-Origin', '*');
                
        }
        $data["status"] = "failed";
        $data["code"] = 401;
        $data["message"] = "信箱或密碼不符合格式";
        return response()->json($data, 401)->header('Access-Control-Allow-Origin', '*');

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login');
    }

}