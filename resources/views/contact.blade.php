<html lang="en" id="contactPage">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<link rel="stylesheet" href={{ asset('css/style.css') }}>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Maven+Pro&display=swap"
    rel="stylesheet">
</head>
<x-navbar/>
<body>
    <div class="container mt-5">
<main>

</main>

</div>
<!--code for dark mode feature use input checkbox for base-->
<input type="checkbox" class="checkbox" id="checkbox">
<label for="checkbox" class="checkbox-label">
    <b class="floating moon" accesskey="n">
        <img src="/assets/animemoon.png" style="    width: 55px;
height: 55px;
border-radius: 50%;"
            alt="moon">
    </b>
    <b class="floating sun" accesskey="s"><img src="/assets/sunMode.png"
            style="width: 55px; height: 55px; border-radius: 50%;" alt=""></b>
</label>

<script>
    const html = document.getElementById("contactPage");
    const checkbox = document.getElementById("checkbox");
    checkbox.addEventListener("change",()=> {
        if (checkbox.checked) {
            html.setAttribute("data-bs-theme","dark");
        }
        else {
            html.setAttribute("data-bs-theme","light");
        }
    })
</script>
</body>
</html>
