<?php

namespace App;

/**
 * 페이지 뷰를 위한 함수
 */
class View
{
    public static function getPolicyInfo($id)
    {
            $getPolicy = \App\Common::getPolicyInfo($id);
            $info['policy'] = array(
                "id" => $getPolicy['id'],
                "title" => $getPolicy['title'],
                "desc" => $getPolicy['desc'],
                "elected" => $getPolicy['elected_id']
            );

            $getElected = \App\Common::getElectedInfo($info['policy']['elected']);
            $info['elected'] = array(
                "id" => $getElected['id'],
                "user" => $getElected['user'],
                "name" => $getElected['name'],
                "chair" => $getElected['chair']
            );

            $getPlan = \App\Common::getPlanList($info['policy']['id']);

            return $info;
    }


}
