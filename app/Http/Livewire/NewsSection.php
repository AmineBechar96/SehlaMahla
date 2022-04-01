<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use\Carbon\Carbon;
class NewsSection extends Component
{
    use WithPagination;
    public $search ;
    public $dateOfNews="any";
    protected $paginationTheme = 'bootstrap';
    public function searchagency()
    {
        $this->gotoPage(1);
        
    }
    public function render()
    {
        $defaultDateS="2000-01-01 00:00:00";
        $yesterday=Carbon::now()->subDay();
        $lastWeekS= Carbon::now()->subWeek()->startOfWeek();
        $lastWeekE = Carbon::now()->subWeek()->endOfWeek();
        $lastMonthS=Carbon::now()->subMonth()->startOfWeek();
        $lastMonthE=Carbon::now()->subMonth()->endOfWeek();
        $lastYearS = Carbon::now()->subYear()->startOfYear();
        $lastYearE = Carbon::now()->subYear()->endOfYear();
        
        $count = News::count();
        $skip = 2;
        $limit = $count - $skip; // the limit
//$collection = News::skip($skip)->take($limit)->get();

if($this->dateOfNews=="any")
{
        return view('livewire.news-section',['news'=>News::whereBetween('date',[$defaultDateS,Carbon::now()])->where(function($sub_query) {
            $sub_query->where('titre','like', '%'.trim($this->search).'%');
        })->orderBy('date','desc')->paginate(2),'news2'=>News::skip(2)->take(News::count()-2)->orderBy('date','desc')->paginate(7),'total'=>News::whereBetween('date',[$defaultDateS,Carbon::now()])->where(function($sub_query) {
        $sub_query->where('titre','like', '%'.trim($this->search).'%');
    })->count()]);}
        elseif($this->dateOfNews=="yesterday")
{
    return view('livewire.news-section',['news'=>News::whereBetween('date',[$yesterday,Carbon::now()])->where(function($sub_query) {
        $sub_query->where('titre','like', '%'.trim($this->search).'%');
    })->orderBy('date','desc')->paginate(2),'news2'=>News::skip(2)->take(News::count()-2)->orderBy('date','desc')->paginate(7),'total'=>News::whereBetween('date',[$yesterday,Carbon::now()])->where(function($sub_query) {
        $sub_query->where('titre','like', '%'.trim($this->search).'%');
    })->count()]);
}
elseif($this->dateOfNews=="lastweek")
{
    return view('livewire.news-section',['news'=>News::whereBetween('date',[$lastWeekS,$lastYearE])->where(function($sub_query) {
        $sub_query->where('titre','like', '%'.trim($this->search).'%');
    })->orderBy('date','desc')->paginate(2),'news2'=>News::skip(2)->take(News::count()-2)->orderBy('date','desc')->paginate(7),'total'=>News::whereBetween('date',[$lastWeekS,$lastYearE])->where(function($sub_query) {
        $sub_query->where('titre','like', '%'.trim($this->search).'%');
    })->count()]);
}
elseif($this->dateOfNews=="lastmonth")
{
    return view('livewire.news-section',['news'=>News::whereBetween('date',[$lastMonthS,$lastMonthE])->where(function($sub_query) {
        $sub_query->where('titre','like', '%'.trim($this->search).'%');
    })->orderBy('date','desc')->paginate(2),'news2'=>News::skip(2)->take(News::count()-2)->orderBy('date','desc')->paginate(7),'total'=>News::whereBetween('date',[$lastMonthS,$lastMonthE])->where(function($sub_query) {
        $sub_query->where('titre','like', '%'.trim($this->search).'%');
    })->count()]);
}
else{
    
   
        return view('livewire.news-section',['news'=>News::whereBetween('date',[$lastYearS,$lastYearE])->where(function($sub_query) {
            $sub_query->where('titre','like', '%'.trim($this->search).'%');
        })->orderBy('date','desc')->paginate(2),'news2'=>News::skip(2)->take(News::count()-2)->orderBy('date','desc')->paginate(7),'total'=>News::whereBetween('date',[$lastYearS,$lastYearE])->where(function($sub_query) {
        $sub_query->where('titre','like', '%'.trim($this->search).'%');
    })->count()]);
    
}
    }
}
