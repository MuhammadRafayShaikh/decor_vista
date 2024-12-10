@extends('master')
@section('content')

<section id="center" class="centre_o pt-5 pb-5">
    <div class="container-xl">
        <div class="row centre_o1">
            <h1 class="mb-0 text-white">Contact
                <span class="pull-right fs-6 fw-normal d-inline-block mt-3 col_light">
                    <a class="text-white" href="#">HOME</a>
                    <span class="mx-1 text-white-50">/</span> CONTACT
                </span>
            </h1>
        </div>
    </div>
</section>
<section id="contact" class="p_3 bg-light">
    <div class="container-xl">
        <div class="row contact_1">
            <div class="col-md-4">
                <div class="contact_1i bg-white pt-5 pb-5 p-4 text-center shadow_box">
                    <span class="fs-1 col_brow"><i class="fa fa-globe"></i></span>
                    <h5 class="mt-2">Visit Our Office</h5>
                    <p class="mb-0">Flat B, 23/3, Semper Jeck Stv, South <br> Lorem, GV79 6WT</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact_1i bg-white pt-5 pb-5 p-4 text-center shadow_box">
                    <span class="fs-1 col_brow"><i class="fa fa-headphones"></i></span>
                    <h5 class="mt-2">Call Us</h5>
                    <p class="mb-0"><a href="tel:+923153307757">0315 3307757</a> <br> Mon - Friday: 9.00am to 6.00pm</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact_1i bg-white pt-5 pb-5 p-4 text-center shadow_box">
                    <span class="fs-1 col_brow"><i class="fa fa-envelope"></i></span>
                    <h5 class="mt-2">Mail Us</h5>
                    <p class="mb-0 mt-2"><a href="mailto:rafay6744@gmail.com?subject=Inquiry&body=Hello, I have a question about...">
                            rafay6744@gmail.com
                        </a>
                        <br><br>
                    </p>
                </div>
            </div>
        </div>
        <div class="row contact_1 text-center mt-4">
            <div class="col-md-12">
                <p class="mb-0">We’re here to help with any question of our customers,
                    <a class="col_brow" href="#">Go to FAQ’s</a>
                </p>
            </div>
        </div>
    </div>
</section>
<section id="contact_o" class="p_3">
    <div class="container-xl">
        <div class="row work_h1 text-center mb-4">
            <div class="col-md-12">
                <h6 class="col_brow fw-bold">DROP US A LINE</h6>
                <h2>SEND YOUR <span class="fw-normal">MESSAGE</span></h2>
                <p class="mb-0">If you have questions or would like more information on our works, please complete the
                    form and <br> we’ll aim to get back to you within 24 hours.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">


                <div class="contact_4i row border_1 p-4 px-2">
                    <form method="POST" action="{{ route('contact.submit') }}" class="php-email-form"
                        data-aos="fade-up" data-aos-delay="400">
                        @csrf
                        <div class="row gy-4">

                            @if (Auth::check())
                            <div class="col-md-6">
                                <input type="text" name="name" value="{{ $user->name }}"
                                    class="form-control bg-light" placeholder="Your Name" readonly>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control bg-light" value="{{ $user->email }}"
                                    name="email" placeholder="Your Email" required="" readonly>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <input type="text" class="form-control bg-light" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' name="subject" placeholder="Subject"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control bg-light" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="error-message"></div>

                                <button type="submit" class="button_2">Contact Us</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509337!2d144.9537363153183!3d-37.81627997975184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f44f1e7%3A0x5045675218ceed0!2sFlat%20B%2C%2023%2F3%2C%20Pak%20Avenue%2C%20Karachi%2C%20Pakistan!5e0!3m2!1sen!2sus!4v1619268852565!5m2!1sen!2sus"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>


<script>
    toastr.success('Operation Successful!');
</script>
@if(session('success'))
<script>
    toastr.success('{{ session('success') }}');
</script>
@endif

@if(session('error'))
<script>
    toastr.error('{{ session('error') }}');
</script>
@endif

@endsection