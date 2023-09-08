

    
<footer class="footer" >

<div class="mt-2">
    <div class="row mt-5">
      <div class="col-lg-1 col-sm-6 m-3"></div>
      <div class="col-lg-3 col-sm-6 m-3">
        <h4 class="mb-2"><a href="#" target="_blank" class="footer-text">{{env('APP_NAME')}} </a></h4>
        <span>Online portals</span>
        <div class="social-icon my-3">
          <a href="https://www.facebook.com/southernleytestateu" target="_blank" class="btn btn-icon btn-sm btn-primary me-2"><i class="fa fa-facebook-square"></i></a>
          <a href="https://youtube.com/c/SouthernLeyteStateUniversity" target="_blank" class="btn btn-icon btn-sm btn-danger me-2"><i class="fa fa-youtube-play"></i></a>
          <a href="https://www.southernleytestateu.edu.ph/index.php/en/" target="_blank" class="btn btn-icon btn-sm btn-success me-2"><i class="	fa fa-globe"></i></a>
          <a href="https://gmail.com" target="_blank" class="btn btn-icon btn-sm btn-danger"><i class="fa fa-google"></i></a>
        </div>
        <p class="pt-1">
          <script>
          document.write(new Date().getFullYear())
          </script> © Province of Southern Leyte
        </p>
      </div>
      <div class="col-lg-2 col-sm-6 m-3">
        <h5 class = "mb-2">Quicklinks</h5>
        <ul class="list-unstyled">
          <li><a target = "_blank" href="https://southernleytestateu.edu.ph" class="footer-link d-block pb-1">Southern Leyte State University</a></li>
          <li><a target = "_blank" href="https://southernleyte.gov.ph" class="footer-link d-block pb-1">Province of Southern Leyte</a></li>
          <li><a target = "_blank" href="https://www.facebook.com/slsuccsit" class="footer-link d-block pb-1">College of CSIT</a></li>
          <li><hr></li>
          <li><a href="{{route('faq')}}" class="footer-link d-block pb-1">Frequently Asked Questions</a></li>
          <li><a href="{{route('privacy')}}" class="footer-link d-block pb-1">Privacy Statement</a></li>
        </ul>
      </div>
      <div class="col-lg-4 col-sm-12 m-5">
        <div class="row">
          <div class="col-lg-3 col-sm-3 col-md-3 col-xs-1 none"></div>
          <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><a target = "_blank" href="https://southernleyte.gov.ph"><img class = "mt-2" src = "{{asset('images/logo-province-so-leyte.jpg')}}" style = "width: 100px"></a></div>
          <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><a target = "_blank" href="https://southernleytestateu.edu.ph"><img class = "mt-2" src = "{{asset('images/logo-slsu.png')}}" style = "width: 100px"></a></div>
          <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><a target = "_blank" href="https://www.facebook.com/slsuccsit"><img class = "mt-2" src = "{{asset('images/logo-ccsit.jpg')}}" style = "width: 100px"></a></div>
        </div>
      </div>
    </div>
  </div>
</footer>

