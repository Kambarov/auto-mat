<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($text)
    {
        $this->sendAlert('success', $text);
    }

    public function info($text)
    {
        $this->sendAlert('info', $text);
    }

    public function alert($text)
    {
        $this->sendAlert('alert', $text);
    }

    public function sendAlert($type, $text)
    {
        request()->session()->flash($type, $text);
    }
}
