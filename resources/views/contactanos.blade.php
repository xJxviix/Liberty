@extends('master2')
@section('title','Liberty')
@section('content')

<section class="contact py-5" id="contact">
    <div class="container pb-md-5">
        <center><h3 class="tittle mb-lg-5 mb-3"> Contáctanos </h3></center>

        <div class="col-md-6">
            <div class=" mx-auto text-left">
                <form name="contactform" id="contactform1" method="post" action="{{ url('contactanos') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-10 con-gd">
                            <div class="form-group">
                                <label>Nombre *</label>
                                <input type="text" class="form-control" id="name" placeholder="" name="name" required="">
                            </div>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-lg-10 con-gd">
                        <div class="form-group">
                                <label>Email *</label>
                                <input type="email" class="form-control" id="email" placeholder="" name="email" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 con-gd">
                            <div class="form-group">
                                <label>Mensaje *</label>
                                <textarea type="text" class="form-control" id="message" placeholder="" name="message" required=""></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 contact-page">
                            <div class="form-group">
                                 <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                    <span><i class="fa fa-check-circle-o"></i> Enviar</span>

                                </button>
                                        
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

        <ul class="list-unstyled row text-left mb-lg-5 mb-3">
            <li class="col-lg-8 adress-info">
                <div class="row">
                    <li class="col-md-9 text-left">
                        <section id="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3120.7544251699815!2d-0.12095318494634899!3d38.53942867557045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6204f0f0af2ae1%3A0x1585f292b7726f31!2sLiberty!5e0!3m2!1ses!2ses!4v1565890535320!5m2!1ses!2ses"
                                width="500" height="400" frameborder="0" style="border:ridge" allowfullscreen style="width:100%;"></iframe>
                        </section> 
                    </li>
                </div>
            </li>
        </ul>
</div>


    <div class="container pb-md-5">
        <ul class="list-unstyled row text-left mb-lg-5 mb-3">
            <li class="col-lg-4 adress-info">
                <div class="row">
                    <div class="col-md-3 text-lg-center adress-icon">
                        <span class="fa fa-map-marker"></span>
                    </div>
                    <div class="col-md-9 text-left">
                        <h6>Dirección</h6>
                        <p>Av de Murcia, 11, 
                            <br>03503 Benidorm, Alicante. </p>
                    </div>
                </div>
            </li>

            <li class="col-lg-4 adress-info">
                <div class="row">
                    <div class="col-md-3 text-lg-center adress-icon">
                        <span class="fa fa-envelope-open-o"></span>
                    </div>
                    <div class="col-md-9 text-left">
                        <h6>Email</h6>
                        <a href="mailto:info@example.com">liberty.benireggae@gmail.com</a>
                    </div>
                </div>
            </li>
            <li class="col-lg-4 adress-info">
                <div class="row">
                    <div class="col-md-3 text-lg-center adress-icon">
                        <span class="fa fa-mobile"></span>
                    </div>
                    <div class="col-md-9 text-left">
                        <h6>Teléfono</h6>
                        <p>+34 659 31 69 61</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</section>

@endsection