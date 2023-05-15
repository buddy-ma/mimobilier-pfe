<?php

namespace App\Http\Controllers\Admin;

use App\Lib\APILib;
use App\Models\Blog;
use App\Models\Ville;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function Dashboard()
    {
        return view('admin.mains-admin.statistics.dashboard');
    }
}