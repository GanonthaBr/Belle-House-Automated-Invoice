@extends('layouts.layout')
@section('content')
@include('includes.topbar')
@include('includes.navbar')


<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{__('Rapports')}}</h2>
            </div>
            <div class="col-12">
                <a href="/">{{__('Accueil')}}</a>
                <a href="/blogs">{{__('Raports')}}</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
<div class="causes">
    <div class="container">
        <div class="owl-carousel causes-carousel">
            @foreach ($reports as $report)
            <div class="causes-item">
                <div class="causes-img">
                    <img src="{{asset('public/storage/' . $report->image)}}" alt="Image" />
                </div>

                <div class="causes-text">
                    <h3>{{$report->title}}</h3>
                    <p>
                        {{$report->description}}
                    </p>
                </div>
                <div class="report-btn">
                    
                    <a href="{{asset('public/storage/' . $report->file)}}" target="_blank">{{__('Lire le Raport')}} &nbsp;  <i class="fa fa-angle-right" style="font-size:20px"></i> </a>
                    <!-- <i class="far fa-arrow-up"></i> -->
                    <a>{{__('Publié par:')}} {{$report->author}}</a> 
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Blog End -->

@stop