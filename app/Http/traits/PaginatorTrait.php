<?php

namespace App\Http\traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\Input;

trait PaginatorTrait
{

    public function arrayPaginator($array, $request)
    {
        $page = $request->input('page');
        $size = 10;
        $data = $array;
        $collect = collect($data);

        $paginationData = new LengthAwarePaginator(
            $collect->forPage($page, $size),
            $collect->count(),
            $size,
            $page,
            [
                'path' => Paginator::resolveCurrentPath(),
            ]
        );

        return $paginationData;
    }
}
