<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingActionRequest;
use App\Models\Setting;
use App\Services\SettingService;
use Cassandra\Set;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $setting;
    /**
     * @var SettingService
     */
    private $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
        $this->setting = Setting::findOrFail(1);
    }

    public function edit()
    {
        $setting = $this->setting;
        return view('dashboard.settings.edit', compact('setting'));
    }

    public function update(SettingActionRequest $request, Setting $setting)
    {
        $this->service->update($request->validated(), $setting);

        $this->info(trans('app.messages.updated'));
        return redirect()->back();
    }
}
