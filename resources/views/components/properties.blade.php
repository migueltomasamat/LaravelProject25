<div class="container-xxl py-5">
    <div class="container">
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach($casas as $inmueble)
                        <x-casa :$inmueble></x-casa>
                    @endforeach
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
