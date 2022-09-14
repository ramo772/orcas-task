<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\traits\PaginatorTrait;
use GuzzleHttp\Psr7\HttpFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use PaginatorTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = DB::select('select * from users ');
        $users = $this->arrayPaginator($users, $request);
        return view('app', compact('users'));
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

    static function fetch_user($users, $schema)
    {
        foreach ($users as $user) {
            $validator = Validator::make($user, [
                $schema[0]->firstName => ['required'],
                $schema[0]->lastName => ['required'],
                $schema[0]->avatar => ['required'],
                $schema[0]->email => ['unique:users,email']
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
