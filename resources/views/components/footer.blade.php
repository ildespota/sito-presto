
        <!-- Footer -->
<footer class="bg-nav text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Presto</h5>
        <p>Il primo sito di annunci in Italia!</p>
        <ul class="list-unstyled">
          <li>Sede legale: via Fermi n° 2</li>
          <li>00100 Roma </li>
          <li>P.IVA 04132350986 </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a  href="@if (Auth::user()) {{route('revisor.create')}} @else {{route('login')}}  @endif" class="text-white text-decoration-none">{{__('ui.work')}}</a>
          </li>
          <li>
            <a href="#!" class="text-white text-decoration-none">Cookie Policy</a>
          </li>
          <li>
            <a href="#!" class="text-white text-decoration-none">Privacy Policy</a>
          </li>
          <li class=" d-flex justify-content-center">
                <x-flag
                  lang="it"
                  flag="it"
                
                />
                <x-flag
                  lang="en"
                  flag="gb"
                
                />
                <x-flag
                  lang="es"
                  flag="es"
                
                />

          </li>

        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Social</h5>

        <ul class="list-unstyled">
          <li>
            <a href="http:\\www.facebook.com" target="_blank" class="text-white text-decoration-none"><i class="fab fa-facebook"></i> Facebook</a>
          </li>
          <li>
            <a href="http:\\www.instagram.com" target="_blank" class="text-white text-decoration-none"><i class="fab fa-instagram"></i> Instagram</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="bg-violet text-center text-white p-3 ">
    © 2021 Copyright:
    <a class="text-white">Class-1 Casa de papel © </a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
     