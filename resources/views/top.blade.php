@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.navbar')

    <!-- NEW ARRIVALS -->
    <div class="row">
        <h2 class="section_title">NEW ARRIVALS</h2>

        <div class="d-flex m-lg-5">

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image1.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image2.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image3.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>
        </div>


        <div class="d-flex m-lg-5">
            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image1.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image2.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image3.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
              <button class="btn btn-outline-dark" type="button">VIEW ALL</button>
        </div>

    </div>

    <!-- PICKUP POST -->
    <div class="row">
        <h2 class="section_title">PICKUP POST</h2>

        <div class="d-flex m-lg-5">

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image1.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image2.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image3.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

        </div>

        <div class="d-flex m-lg-5">
            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image1.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image2.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image3.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
              <button class="btn btn-outline-dark" type="button">VIEW ALL</button>
        </div>
    </div>

    <!-- TREND -->
    <div class="row">
        <h2 class="section_title">TREND</h2>

        <div class="d-flex m-lg-5">

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image1.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image2.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image3.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

        </div>

        <div class="d-flex m-lg-5">
            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image1.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image2.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

            <div class="col-4"> 
                <a href="#" class="thumbnail">
                    <img src="{{ asset('img/image3.jpg') }}" class="img-rounded" width="200" height="200"/>
                    <div class="card__txt">
                        <p class="card__title">title</p>
                            <p class="card__sub">place</p>
                        <p class="card__uploaddate">uploaddate</p>
                    </div>
                </a>
            </div>

        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
              <button class="btn btn-outline-dark" type="button">VIEW ALL</button>
        </div>

    </div>

</div>
@endsection
