
<footer class="text-center text-white" style="background-color: #f1f1f1;">
    <!-- Grid container -->
    <div class="container pt-4">
        <!-- Section: Social media -->
        <section class="mb-4">

            <!-- Instagram -->
            <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="https://www.instagram.com/alexavierdev/"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-instagram"></i
                ></a>

            <!-- Linkedin -->
            <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="https://www.linkedin.com/in/alexsandroxavier/"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-linkedin"></i
                ></a>
            <!-- Github -->
            <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="https://github.com/AlexavierDev"
                    role="button"
                    data-mdb-ripple-color="dark"
            ><i class="fab fa-github"></i
                ></a>
        </section>

    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
       Copyrigth @ <span id="anoAtual"></span>
        <a class="text-dark" target="_blank" href="https://github.com/AlexavierDev">Alex Xavier</a>
    </div>
    <!-- Copyright -->
</footer>

<script>
    let date = new Date();
    let anoAtual = date.getFullYear();
    let anoCopyrigth = document.getElementById('anoAtual');
    anoCopyrigth.innerText = anoAtual;
</script>
