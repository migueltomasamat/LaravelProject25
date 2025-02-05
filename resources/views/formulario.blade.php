<x-layout>
    <x-nav></x-nav>
    <div class="container-xxl py-5">
        <div class="container d-flex justify-content-center">
                <div class="col-md-8 justify-content-center">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form method="post" action="/api">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>
</x-layout>
