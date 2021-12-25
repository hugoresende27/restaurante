    <style> 
        img#imgCust{
            width: 50px;
            height: 200px;
        }
    </style>
    
    <!-- ***** Chefs Area Starts ***** -->
 
    <!-- ***** Chefs Area Ends ***** -->
    <section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Os nossos chefes</h6>
                        <h2>Igredientes frescos e biológicos sempre</h2>
                    </div>
                </div>
            </div>
   
            <div class="row">
    @foreach($data2 as $data2)

                
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img id="imgCust" src="chefimage/{{$data2->image}}"  alt="Chef #1">
                        </div>
                        <div class="down-content">
                            <h4>{{$data2->name}}</h4>
                            <span>{{$data2->speciality}}</span>
                        </div>
                    </div>
                </div>  
                
    @endforeach  
            </div>
      
        </div>
    </section>
    