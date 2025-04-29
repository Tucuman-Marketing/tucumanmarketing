@extends('webcontent::website.rrhh.layouts.index')

@section('other-css')
@stop


@section('content')
@include('flash::message')



    <!--breadcrumb section start-->
    <section class="agency breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="breadcrumb-text text-center">Wiva - Consultora</h2>
                    <ul class="breadcrumb justify-content-center">

                        <li><a href="index.html">Wiva - Consultora <Prog></Prog></a></li>
                        <li><a href="blog.html">Posiciones Vacantes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--breadcrumb section end-->

    <!-- Section Search -->
    <section class="agency blog blog-sec blog-sidebar blog-split">
        <div class="container">
            <div class="row ps-0 pe-0">
                <div class="col-lg-12">
                    <div id="search-filters">
                        <form>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="fecha-publicacion">Fecha de Publicación:</label>
                                    <input type="date" id="fecha-publicacion" name="fecha-publicacion">
                                </div>

                                <div class="form-group">
                                    <label for="rango-fecha-inicio">Desde:</label>
                                    <input type="date" id="rango-fecha-inicio" name="rango-fecha-inicio">
                                </div>

                                <div class="form-group">
                                    <label for="rango-fecha-fin">Hasta:</label>
                                    <input type="date" id="rango-fecha-fin" name="rango-fecha-fin">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nivel-experiencia">Nivel de Experiencia:</label>
                                    <select id="nivel-experiencia" name="nivel-experiencia">
                                        <option value="junior">Junior</option>
                                        <option value="senior">Senior</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tipo-empleo">Tipo de Empleo:</label>
                                    <select id="tipo-empleo" name="tipo-empleo">
                                        <option value="remoto">Remoto</option>
                                        <option value="hibrido">Híbrido</option>
                                        <option value="presencial">Presencial</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="ubicacion">Ubicación:</label>
                                    <input type="text" id="ubicacion" name="ubicacion">
                                </div>

                                <div class="form-group">
                                    <label for="sector">Sector:</label>
                                    <input type="text" id="sector" name="sector">
                                </div>
                            </div>

                            <div class="form-row">
                                <label for="skills">Skills:</label>
                                <select multiple id="skills" name="skills">
                                    <option value="javascript">JavaScript</option>
                                    <option value="python">Python</option>
                                    <!-- Agrega más opciones según necesites -->
                                </select>
                            </div>

                            <div class="form-row">
                                <label for="cargo">Cargo:</label>
                                <input type="text" id="cargo" name="cargo">
                            </div>

                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- section start -->
    <section class="agency blog blog-sec blog-sidebar blog-split">
        <div class="container">
            <div class="row ps-0 pe-0">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 blog-sec blog-list">
                            <div class="blog-agency">
                                <div class="row blog-contain ps-0 pe-0">
                                    <div class="col-xl-3 col-lg-4 col-md-6 p-0">
                                        <div class=" text-center">
                                            <img alt="" class="img-fluid blog-img" src="img/agency/blog/6.jpg')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-8 col-md-6 p-0">
                                        <div class="img-container center-content">
                                            <div class="center-content">
                                                <div class="blog-info">
                                                    <div class="m-b-20">
                                                        <div class="center-text">
                                                            <i aria-hidden="true" class="fa fa-clock-o m-r-10"></i>
                                                            <h6 class="m-r-25 font-blog">June 19, 2019</h6>
                                                            <i aria-hidden="true" class="fa fa-map-marker m-r-10"></i>
                                                            <h6 class="font-blog">Remote</h6>
                                                        </div>
                                                    </div>
                                                    <h5 class="blog-head font-600">SR. PHP / LARAVEL</h5>
                                                    <p class="para2">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy text
                                                        ever since the.
                                                    </p>
                                                    <div class="btn-bottom m-t-20">
                                                        <a class="text-uppercase" href="#">Aplicar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 blog-sec blog-list">
                            <div class="blog-agency">
                                <div class="row blog-contain ps-0 pe-0">
                                    <div class="col-xl-3 col-lg-4 col-md-6 p-0 order-md-2">
                                        <div class=" text-center">
                                            <img alt="" class="img-fluid blog-img" src="img/agency/blog/2.jpg')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-8 col-md-6 p-0">
                                        <div class="img-container center-content">
                                            <div class="center-content">
                                                <div class="blog-info">
                                                    <div class="m-b-20">
                                                        <div class="center-text">
                                                            <i aria-hidden="true" class="fa fa-clock-o m-r-10"></i>
                                                            <h6 class="m-r-25 font-blog">June 19, 2019</h6>
                                                            <i aria-hidden="true" class="fa fa-map-marker m-r-10"></i>
                                                            <h6 class="font-blog">Phonics ,Newyork</h6>
                                                        </div>
                                                    </div>
                                                    <h5 class="blog-head font-600">SSR. JAVA DEVELOPER</h5>
                                                    <p class="para2">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy text
                                                        ever since the.
                                                    </p>
                                                    <div class="btn-bottom m-t-20">
                                                        <a class="text-uppercase" href="#">Aplicar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 blog-sec blog-list">
                            <div class="blog-agency">
                                <div class="row blog-contain ps-0 pe-0">
                                    <div class="col-xl-3 col-lg-4 col-md-6 p-0">
                                        <div class=" text-center">
                                            <img alt="" class="img-fluid blog-img" src="img/agency/blog/3.png')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-8 col-md-6 p-0">
                                        <div class="img-container center-content">
                                            <div class="center-content">
                                                <div class="blog-info">
                                                    <div class="m-b-20">
                                                        <div class="center-text">
                                                            <i aria-hidden="true" class="fa fa-clock-o m-r-10"></i>
                                                            <h6 class="m-r-25 font-blog">June 19, 2019</h6>
                                                            <i aria-hidden="true" class="fa fa-map-marker m-r-10"></i>
                                                            <h6 class="font-blog">Phonics ,Newyork</h6>
                                                        </div>
                                                    </div>
                                                    <h5 class="blog-head font-600">Twice profit than before you</h5>
                                                    <p class="para2">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy text
                                                        ever since the.
                                                    </p>
                                                    <div class="btn-bottom m-t-20">
                                                        <a class="text-uppercase" href="#">read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 blog-sec blog-list">
                            <div class="blog-agency">
                                <div class="row blog-contain ps-0 pe-0">
                                    <div class="col-xl-3 col-lg-4 col-md-6 p-0 order-md-2">
                                        <div class=" text-center">
                                            <img alt="" class="img-fluid blog-img" src="img/agency/blog/4.jpg')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-8 col-md-6 p-0">
                                        <div class="img-container center-content">
                                            <div class="center-content">
                                                <div class="blog-info">
                                                    <div class="m-b-20">
                                                        <div class="center-text">
                                                            <i aria-hidden="true" class="fa fa-clock-o m-r-10"></i>
                                                            <h6 class="m-r-25 font-blog">June 19, 2019</h6>
                                                            <i aria-hidden="true" class="fa fa-map-marker m-r-10"></i>
                                                            <h6 class="font-blog">Phonics ,Newyork</h6>
                                                        </div>
                                                    </div>
                                                    <h5 class="blog-head font-600">Twice profit than before you</h5>
                                                    <p class="para2">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy text
                                                        ever since the.
                                                    </p>
                                                    <div class="btn-bottom m-t-20">
                                                        <a class="text-uppercase" href="#">read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@section('other-scripts')
@stop
@endsection
