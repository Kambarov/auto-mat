<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public function update(array $attributes, Setting $setting)
    {
        return $setting->update($attributes);
    }
}
