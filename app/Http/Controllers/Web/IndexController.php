<?php

namespace App\Http\Controllers\Web;

use App\Portfolio;
use App\PortfolioImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('web.index');
    }

    public function projects(){
        $projects = Portfolio::orderBy('id', 'DESC')->paginate(5);
        return $projects;
    }

    public function project($id){
        $project = Portfolio::where('id', $id)->first();
        return $project;
    }

    public function projectImages($id){
        $projectImages = PortfolioImage::where('portfolio_id', $id)->paginate(5);
        return $projectImages;
    }
}
