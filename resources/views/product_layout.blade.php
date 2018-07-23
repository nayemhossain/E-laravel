
    @include('inc.header')

   

    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                     @include('inc.sidebar')
                </div>
                
                <div class="col-sm-9 padding-right">
                    @yield('features')
                    
                    
                    
                    

                    <!--/recommended_items-->
                    
                </div>
            </div>
        </div>
    </section>
    @include('inc.footer')
    