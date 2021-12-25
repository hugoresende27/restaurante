<style>
    input[type=number]{
        width: 50px;
    }
    input[type=number]:focus{
        background-color: grey;
    }

</style>


<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Os nossos pratos</h6>
                        <h2>A nossa seleção de sobremesas</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">

                @foreach ($data as $data)
                <form action="{{url('/addcard', $data->id)}}" method="post">
                    
                    @csrf


                    <div class="item">
                        <div style = "background-image: url('/foodimage/{{$data->image}}')"class='card'>
                            <div class="price"><h6>{{$data->price}} €</h6></div>
                            <div class='info'>
                              <h1 class='title'>{{$data->title}}</h1>
                              <p class='description'>{{$data->description}}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Faça uma reserva <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                        <div id="cust">
                            <input type="number" name="qtd" min="1" value="1" >
                            <input type="submit" value="Adicionar ao cesto" class="btn btn-danger" style="color:black">
                        </div>
                    </div>

                </form>

                @endforeach

                    
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->
