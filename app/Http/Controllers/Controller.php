<?php

/**
* @OA\server(
*      url = "http://localhost",
*      description="Localhost"
* )
* @OA\Info(
*    title="API文件練習",
*    version="1.0.0",
*)
*/

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
