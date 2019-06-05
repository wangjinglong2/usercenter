<?php
namespace App\Http\Controllers\Common;

use App\Models\Region;
use Input;
use Response;

trait RegionController
{

    /**
     * 返回省份列表
     * @return array|mixed
     */
    protected function getRegionProvinces()
    {
        $result = (new Region)->getProvinces();
        view()->share('provinces', $result);
        return $result;
    }

    public function getRegion()
    {
        $type = intval(Input::get('type', 0));
        $pid = intval(Input::get('pid', 0));
        if ($pid <= 0) {
            return Response::json(array(
                'status' => -1,
                'error' => 'param pid is not found'
            ));
        }
        return Response::json(array(
            'status' => 0,
            'list' => (new Region())->getByPid($pid, $type)
        ));

    }
}
