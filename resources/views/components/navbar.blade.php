<link rel="stylesheet" href="css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Maven+Pro&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<style>
    /*styling to navbar*/
    .navbarOnly {
    font-family:{{$appFont}};
    font-optical-sizing: auto;
    font-size: normal;
    box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.5);
}

</style>
<!--Use library boostrap-->
<nav class="navbarOnly navbar navbar-expand-lg bg-body-tertiary text-center">
    <div class="container-fluid justify-content-center">
        <a class="navbar-brand justify-content-between" href="/halamanUtama">Portofolio Erik's</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/halamanUtama">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/page/projek') }}">Projek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">About me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/page/contact-me">Contact me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disable" id="timeNow"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><img
                            src="https://res.cloudinary.com/ddhfubnez/image/upload/v1747441140/fotoDiri_j5mj43.jpg"
                            style="border-radius: 50%"; alt="user image" width="25px" height="25px"></a>
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
              <li><a class="dropdown-item" href="#">Something else here</a></li>2
            </ul>
          </li> --}}

            </ul>

        </div>
    </div>
</nav>


<script>
    function updateTime() {
        const now = new Date();
        const currentTime = now.toLocaleTimeString();

        const timeNow = document.getElementById("timeNow").innerText = currentTime;
    }
    setInterval(updateTime, 1000)
</script>
