<?php


use App\Models\Admin\Notification;
use App\Models\Admin\User_Rating;
use Softon\Indipay\Facades\Indipay;

function user_theme_get()
{
    $theme = \Illuminate\Support\Facades\Auth::user()->theme_color;
    return $theme;
}
