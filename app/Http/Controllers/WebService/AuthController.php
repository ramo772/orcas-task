<?php

namespace App\Http\Controllers\WebService;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebService\LoginRequest;
use App\Http\Resources\WebService\AdminResource;
use App\Http\Traits\WebServiceResponse;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use WebServiceResponse;
    public function login(LoginRequest $request)
    {

        // get admin email
        $admin = Admin::where(['email' => strtolower($request->email)])->first();
        // check email and password
        if (!$admin)
            return $this->error_response("user not found");
        if (!Hash::check($request->password, $admin->password))
            return $this->error_response("wrong password");
        //Create Token
        $token = $admin->createToken('orcas')->accessToken;
        return $this->success_response(['admin' => new AdminResource($admin), 'token' => $token]);
    }

    public function register(Request $request)
    {
        $register_values = array(
            $request['name'],
            $request['email'],
            bcrypt($request['password']),
        );
        // inserting values to database
        DB::statement("INSERT INTO `admins`( `name`, `email`, `password`) VALUES ('" . implode("','", array_values($register_values)) . "') ");
        // get the admin from db
        $admin = Admin::orderBy('id', 'DESC')->first();
        //Create Token
        $token = $admin->createToken('orcas')->accessToken;
        return $this->success_response(['user' => new AdminResource($admin), 'token' => $token]);
    }
}
