<?php

namespace App\Http\Controllers;

use App\Models\Orderhome;
use Illuminate\Http\Request;
use Mail;
use View;

class OrderController extends Controller
{
    //
    public $configs;
    public $configsGlobal;

    public function __construct()
    {
        //=======Config====
        $configs = \Helper::configs();
        $configsGlobal = \Helper::configsGlobal();
        //============end config====
        $this->configsGlobal = $configsGlobal;
        $this->configs = $configs;

    }

    public function orderProduct(Request $request)
    {

        try {
            $data = $request->all();
            $dataRequest = array();
            $dataRequest['email'] = $data['email'];
            $dataRequest['sanpham'] = $data['congty'];
            $dataRequest['soluong'] = $data['soluong'];
            $dataRequest['fullname'] = $data['hoten'];
            $dataRequest['dienthoai'] = $data['dienthoai'];
            $dataRequest['diachi'] = $data['diachi'];
            $dataRequest['ghichu'] = $data['noidung'];
            if (isset($dataRequest) && count($dataRequest) > 0) {
                Orderhome::insert($dataRequest);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
        return redirect()->back()->with(['message' => trans('language.subscribe.subscribe_success')]);
    }
}
