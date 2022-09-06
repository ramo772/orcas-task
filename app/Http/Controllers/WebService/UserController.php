<?php

namespace App\Http\Controllers\WebService;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use GuzzleHttp\Psr7\HttpFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // get all users
        $users = DB::select('select * from users ');
        // pagination
        $users = $this->arrayPaginator($users, $request);
        return  $this->success_response(UserResource::collection($users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        // get users that are like the search value
        $search_result =DB::select("select * from users where firstName like '%$request->search%' or lastName like '%$request->search%' or email like '%$request->search%' ");
        return  $this->success_response(UserResource::collection($search_result));

    }

    static function fetch_user($users, $schema)
    {
        foreach ($users as $user) {
            $validator = Validator::make($user, [
                'firstName' => ['required'],
                'lastName' => ['required'],
                'avatar' => ['required'],
                'email' => ['unique:users,email']
            ]);
            if (!$validator->fails()) {
                DB::table('users')->insert([
                    'firstName'   =>  $user[$schema[0]->firstName],
                    'lastName'   =>   $user[$schema[0]->lastName],
                    'avatar'   =>  $user[$schema[0]->avatar],
                    'email'   =>   $user[$schema[0]->email]
                ]);
            }
        }
    }
}
