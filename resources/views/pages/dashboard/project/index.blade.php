@extends('layouts.admin.app')

@section('content')
<section class="statistic statistic2 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number">0</h2>
                    <span class="desc">Project Submitted</span>
                    <div class="icon">
                        <i class="zmdi zmdi-edit"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--orange">
                    <h2 class="number">0</h2>
                    <span class="desc">Project Done</span>
                    <div class="icon">
                        <i class="zmdi zmdi-check-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--blue">
                    <h2 class="number">0</h2>
                    <span class="desc">Project Rejected</span>
                    <div class="icon">
                        <i class="zmdi zmdi-close-circle-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--red">
                    <h2 class="number">0</h2>
                    <span class="desc">Project Invested</span>
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection