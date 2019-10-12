<?php

if (!function_exists('getStatusName')){
    function getStatusName($status){
        $statusName = '';
        switch ($status){
            case 0:
                $statusName = 'Private';
                $type = 'danger';
                break;
            case 1:
                $statusName = 'Shared';
                $type = 'warning';
                break;
            case 2:
                $statusName = 'Public';
                $type = 'primary';
                break;
        }

        return "<span class='badge badge-$type status'>$statusName</span>";
    }
}

if (!function_exists('formatDate')){
    function formatDate($date){
        return date("\T\\h\\e d.m.Y \a\\t H:i:s", strtotime($date));
    }
}

if (!function_exists('downloadLink')){
    function downloadLink($displayedName, $route){
        return "<a href='$route' target='_blank'>$displayedName</a>";
    }
}

if (!function_exists('formatSize')){
    /* From : https://stackoverflow.com/a/11860664 */
    function formatSize($size){
        $units = array('o', 'ko', 'Mo', 'Go');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 0, '.', ',') . ' [' . $units[$power] . ']';
    }
}
