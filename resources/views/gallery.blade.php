
@extends('master')
@section('content')
<style>
  .gallery .container-fluid {
  margin-bottom: 3px;
}

.gallery .gallery-map iframe {
  width: 100%;
  height: 100%;
  min-height: 300px;
}

.gallery .gallery-info {
  background: url("../img/gallery-info-bg.jpg") top center no-repeat;
  background-size: cover;
  position: relative;
  padding-top: 60px;
  padding-bottom: 60px;
}

.gallery .gallery-info:before {
  content: "";
  background: rgba(0, 0, 0, 0.5);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}

.gallery .gallery-info h3 {
  font-size: 36px;
  font-weight: 700;
  color: var(--contrast-color);
}

@media (max-width: 574px) {
  .gallery .gallery-info h3 {
    font-size: 24px;
  }
}

.gallery .gallery-info p {
  color: var(--contrast-color);
  margin-bottom: 0;
}

.gallery .gallery-gallery-container {
  padding-right: 12px;
}

.gallery .gallery-gallery {
  overflow: hidden;
  border-right: 3px solid var(--background-color);
  border-bottom: 3px solid var(--background-color);
}

.gallery .gallery-gallery img {
  transition: all ease-in-out 0.4s;
}

.gallery .gallery-gallery:hover img {
  transform: scale(1.1);
}
/* cards */
.gallery .card {
  background-color: var(--surface-color);
  color: var(--default-color);
  border: none;
  position: relative;
 
}

.gallery .card .card-img {
  overflow: hidden;
  margin-bottom: 15px;
  border-radius: 0;
 
}

.gallery .card .card-img img {
  transition: 0.3s ease-in-out;
}

.gallery .card h3 {
  font-weight: 600;
  font-size: 20px;
  margin-bottom: 5px;
  padding: 0 20px;
}

.gallery .card a {
  color: var(--heading-color);
  transition: 0.3;
}

.gallery .card a:hover {
  color: var(--accent-color);
}

.gallery .card .stars {
  padding: 0 20px;
  margin-bottom: 5px;
}

.gallery .card .stars i {
  color: #ffc107;
}

.gallery .card p {
  padding: 0 20px;
  margin-bottom: 20px;
  color: color-mix(in srgb, var(--default-color), transparent 40%);
  font-style: italic;
  font-size: 15px;
}

.gallery .card:hover .card-img img {
  transform: scale(1.1);
}
</style>
<br> <br> <br><br><br>
<section id="gallery" class="gallery section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2 class="text-center">Gallery<br></h2>
    <p  class="text-center">Step into our event gallery and discover spaces that transform your ideas into reality</p>
  </div><!-- End Section Title -->

 

    

  </div>

  <div class="container-fluid gallery-container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-0">

    @foreach ($gallery as $gall)
    <div class="col-lg-3 col-md-4">
      <div class="gallery-gallery">
        <a href="#" loading="lazy" class="glightbox" data-gall="gallery">
          <img src="gallery/{{$gall->g_image}}"  alt="" height="250px" width="100%" >
        </a>
      </div>
    </div>
<!-- End Card Item -->
@endforeach
    </div>
  </div>

</section>
<br><br><br>
@endsection