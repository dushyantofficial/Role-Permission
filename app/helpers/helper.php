<?php


use App\Models\Admin\Notification;
use App\Models\Admin\User_Rating;
use Softon\Indipay\Facades\Indipay;

function user_theme_get()
{
    $theme = \Illuminate\Support\Facades\Auth::user()->theme_color;
    return $theme;
}
function auth_user_get()
{
    $background = \Illuminate\Support\Facades\Auth::user();
    return $background;
}

function user_bar_chart()
{
    $users = \App\Models\User::select(
        \Illuminate\Support\Facades\DB::raw("COUNT(*) as count"),
        \Illuminate\Support\Facades\DB::raw("MONTHNAME(created_at) as month_name"),
        \Illuminate\Support\Facades\DB::raw("MONTH(created_at) as month_number")
    )
        ->whereYear('created_at', date('Y'))
        ->groupBy(\Illuminate\Support\Facades\DB::raw("MONTH(created_at)"), 'month_name')
        ->pluck('count', 'month_name');
    return $users;
}

