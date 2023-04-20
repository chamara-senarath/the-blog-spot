<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Stat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StatController extends Controller
{
    public function index(Blog $blog)
    {
        $total_views = $this->totalViews($blog->id);
        $views_by_week = $this->viewsByWeek($blog->id);
        $views_by_month = $this->viewsByMonth($blog->id);
        $views_by_year = $this->viewsByYear($blog->id);
        return view('blogs.stats', [
            'blog' => $blog,
            'total_views' => $total_views,
            'views_by_week' => $views_by_week,
            'views_by_month' => $views_by_month,
            'views_by_year' => $views_by_year
        ]);
    }

    // Get total view counts for a blog post
    private function totalViews($blogId)
    {
        return Stat::where('blog_id', $blogId)->count();
    }

    // Get total views for a blog post in last week
    private function viewsByWeek($blogId)
    {
        return Stat::where([['blog_id', $blogId], ['created_at', '>=', Carbon::now()->subWeek()]])
            ->count();
    }

    // Get total views for a blog post in last month
    private function viewsByMonth($blogId)
    {
        return Stat::where([['blog_id', $blogId], ['created_at', '>=', Carbon::now()->subMonth()]])
            ->count();
    }

    // Get total views for a blog post in last year
    private function viewsByYear($blogId)
    {
        return Stat::where([['blog_id', $blogId], ['created_at', '>=', Carbon::now()->subYear()]])
            ->count();
    }
}
