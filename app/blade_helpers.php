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

        return "<span class='badge badge-$type'>$statusName</span>";
    }
}

if (!function_exists('formatDate')){
    function formatDate($date){
        return date("\T\\h\\e d.m.Y \a\\t h:i:s", strtotime($date));
    }
}

if (!function_exists('downloadLink')){
    function downloadLink($displayedName, $route){
        return "<a href='$route' target='_blank'>$displayedName</a>";
    }
}
