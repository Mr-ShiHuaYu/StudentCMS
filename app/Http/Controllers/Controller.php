<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param  string  $msg
     * @param  array  $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success(string $msg = '成功', array $data = [])
    {
        return response()->json(
            [
                'status' => 'success',
                'msg' => $msg,
                'data' => $data,
            ]
        );
    }

    /**
     * @param  string  $msg
     * @param  array  $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function fail(string $msg = '失败', array $data = [])
    {
        return response()->json(
            [
                'status' => 'fail',
                'msg' => $msg,
                'data' => $data,
            ]
        );
    }
}
