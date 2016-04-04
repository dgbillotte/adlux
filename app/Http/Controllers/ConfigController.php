<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ConfigController extends Controller {
    
    public function allValues() {
        $config = [];
        return view('all_config_items', ['config' => $config]);
    }

    public function getValue($name) {
        $config = [];
        return view('view_config_item', ['name' => $name, 'value' => $config[$name]]);
    }

    public function updateValue($name, $value) {
        $config = [];
        $config[$name] = $value;
        return redirect('config/get/' . $name);
    }
}
