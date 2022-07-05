@extends('layout')
@section('content')
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <!-- Begin: Testimonals 1 component -->
            <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
                <!-- Begin: Title 1 component -->
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold">Danh Mục Dịch Vụ</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>

                <div class="row row-flex-safari game-list">
                    <div class="col-sm-3 col-xs-6 p-5">
                        <div class="classWithPad">
                            <div class="news_image">
                                <img style="position: absolute;max-width: 79px;height: auto;top: -5px;right: -6px;z-index: 1122;" src="{{asset('frontend/img/giam.png')}}"/>
                                <a href="{{route('dichvucon','lien-quan')}}" title="Danh Mục Game Liên Quân" class=" ">
                                    <img src="{{asset('frontend/img/0jjbYp7OmJ_1623164374.gif')}}" alt="Danh Mục Game Liên Quân">
                                </a>
                            </div>
                            <div class="news_title">
                                <h2>
                                    <a href="{{route('dichvucon','lien-quan')}}" title="Danh Mục Game Liên Quân">Danh Mục Game Liên Quân</a>
                                </h2>
                            </div>
                            <div class="news_description">
                                <p>
                                    Số tài khoản: 23,763
                                </p>
                            </div>

                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="custom72 view">
                                            <a href="#" class="" title="Danh Mục Game Liên Quân">
                                                &nbsp;
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End-->
                </div>
                <!-- End-->
            </div>
        </div>
        <!-- END: PAGE CONTENT -->
    </div>
</div>
@endsection
