<?php

namespace App\Http\Controllers\WebService;

use App\Http\Controllers\Controller;
use App\Models\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schema = DB::select("select * from `schemas` where `id` = 1 limit 1");
        $apis = DB::select('select * from apis limit 1');
        foreach ($apis as $api) {
            $users = Http::get($api->link)->json();
            $schema = DB::select("select * from `schemas` where `id` = $api->schema_id");
            UserController::fetch_user($users, $schema);
        }
        return $this->success_response("apis fetched successfully");

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
    public function store(Request $request)
    {
        $schema_keys = array(
            $request['firstName'],
            $request['lastName'],
            $request['avatar'],
            $request['email']
        );
        DB::statement("INSERT INTO `schemas`( `firstName`, `lastName`, `avatar`, `email`) VALUES ('" . implode("','", array_values($schema_keys)) . "') ");
        $schema_id = DB::select('select MAX(id) as id from `schemas`');
        $api_data = array(
            $request['link'],
            $schema_id[0]->id
        );
        DB::statement("INSERT INTO `apis`( `link`, `schema_id`) VALUES ('" . implode("','", array_values($api_data)) . "') ");
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
}
