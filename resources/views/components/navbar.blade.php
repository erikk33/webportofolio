<!--Use library boostrap-->
<nav class="navbarOnly navbar navbar-expand-lg bg-body-tertiary text-center">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand justify-content-between" href="/halamanUtama">Portofolio Erik's</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/halamanUtama">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url("/page/projek") }}">Projek</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">About me</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/page/contact-me">Contact me</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">`<img src="{{ asset("/assets/fotoDiri.jpg") }}" style="border-radius: 50%"; alt="user image" width="25px" height="25px"></a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> --}}
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> --}}

        </ul>

      </div>
    </div>
  </nav>
