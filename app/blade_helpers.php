<?php

if (!function_exists('getStatusName')){
    function getStatusName($status){
        $statusName = '';
        switch ($status){
            case 0:
                $statusName = 'Private';
                break;
            case 1:
                $statusName = 'Public';
                break;
            case 2:
                $statusName = 'Shared';
                break;
        }

        return $statusName;
    }
}

if (!function_exists('formatDate')){
    function formatDate($date){
        return date("\T\\h\\e d.m.Y \a\\t H:m:s", strtotime($date));
    }
}
