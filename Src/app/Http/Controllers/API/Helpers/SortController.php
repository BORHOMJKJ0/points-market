<?php

namespace App\Http\Controllers\API\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SortController extends Controller
{
    public function __invoke(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->ids as $key => $id) {
                DB::table($request->table_name)
                    ->whereId($id)
                    ->update([
                        'sort' => $key,
                    ]);
            }
        });

    }
}
