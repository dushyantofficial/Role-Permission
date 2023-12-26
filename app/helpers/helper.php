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

function googleLineChart()
{
    $visitors = \App\Models\User::select("created_at", "status")->get();

    // Initialize arrays to store data
    $activeData = [];
    $blockData = [];

// Loop through the visitors and categorize by status
    foreach ($visitors as $key => $value) {
        $date = $value->created_at->format('Y-m-d');

        if ($value->status == 'active') {
            $activeData[$date] = ($activeData[$date] ?? 0) + 1;
        } elseif ($value->status == 'Block') {
            $blockData[$date] = ($blockData[$date] ?? 0) + 1;
        }
    }

// Prepare data for the chart
    $result[] = ['Dates', 'Active', 'Block'];
    foreach ($activeData as $date => $activeCount) {
        $result[] = [$date, $activeCount, $blockData[$date] ?? 0];
    }

    return $result;
}

function userRole()
{
    $visitors = \App\Models\User::with('roles')->get();

    // Initialize arrays to store data
    $roleData = [];

    // Loop through the visitors and categorize by role
    foreach ($visitors as $key => $value) {
        $roles = $value->roles->pluck('name')->toArray();

        foreach ($roles as $role) {
            $roleData[$role] = ($roleData[$role] ?? 0) + 1;
        }
    }

    // Prepare data for the chart
    $result[] = array_merge(['Roles'], array_keys($roleData));

    $rowData = [];
    foreach ($result[0] as $role) {
        $rowData[] = $roleData[$role] ?? 0;
    }
    $result[] = $rowData;

    return $result;
}

