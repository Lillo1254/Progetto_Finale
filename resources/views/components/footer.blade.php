<footer class="primary-light-bg text-center">
    <div class="container p-4">
        <div class="mb-3 d-flex justify-content-center flex-wrap gap-2">
            <ul class="list-unstyled d-flex flex-wrap flex-md-nowrap justify-content-center gap-1">
                <li>
                    <a class="btn footer-icon btn-outline btn-floating m-1 p-2" href="#!" role="button">
                        <i class="fs-4 icon-i bi bi-facebook"></i>
                    </a>
                </li>

                <li>                    
                    <a class="btn footer-icon btn-outline btn-floating m-1 p-2" href="#!" role="button">
                        <i class="fs-4 icon-i bi bi-twitter"></i>
                    </a>
                </li>

                <li>                    
                    <a class="btn footer-icon btn-outline btn-floating m-1 p-2" href="#!" role="button">
                        <i class="fs-4 icon-i bi bi-google"></i>
                    </a>
                </li>

                <li>                    
                    <a class="btn footer-icon btn-outline btn-floating m-1 p-2" href="#!" role="button">
                        <i class="fs-4 icon-i bi bi-instagram"></i>
                    </a>
                </li>

                <li>
                    <a class="btn footer-icon btn-outline btn-floating m-1 p-2" href="#!" role="button">
                        <i class="fs-4 icon-i bi bi-linkedin"></i>
                    </a>
                </li>

                <li>
                    <a class="btn footer-icon btn-outline btn-floating m-1 p-2" href="#!" role="button">
                        <i class="fs-4 icon-i bi bi-github"></i>
                    </a>
                </li>
            </ul>
        </div>


        <!-- ! LAVORA CON NOI -->
        @auth
            <a href="{{ route('form.revisor') }}" class="btn btn-form mb-5 rounded-5 px-5"><p class="p-0 m-0 dark-text fs-5">Lavora con noi</p></a>       
        @endauth


        <div class="row justify-content-center">

            <div class="col-1 d-none d-md-block"></div>

            <!-- ! COMPANY -->
            <div class="col-12 col-md-5 text-start px-md-5 pb-5 pb-md-0">
                <h3 class="mb-3 secondary-text fw-light">JASL</h3>
                <small class="mb-4 text-start">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                        repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam eum
                        harum corrupti dicta, aliquam sequi voluptate quas.
                    </p>
                </small>
            </div>
    

            <!-- ! INFO -->
            <div class="col-12 col-sm-6 col-md-3 me-0 mb-4 text-start">
                <h3 class="mb-3 secondary-text fw-light">Info</h3>
                <ul class="list-unstyled">
                    <li class="pb-2 pb-md-3">
                        <small class="white-text"><i class="bi bi-house-door-fill me-1"></i> New York, NY 10012, US</small>

                    </li>
                    <li class="pb-2 pb-md-3">
                        <small class="white-text"><i class="bi bi-envelope-fill me-1"></i> info@example.com</small>
                        
                    </li>
                    <li class="pb-2 pb-md-3">
                        <small class="white-text"><i class="bi bi-telephone-fill me-1"></i> + 01 234 567 88</small>
                        
                    </li>
                    <li class="pb-2 pb-md-3">
                        <small class="white-text"><i class="bi bi-printer-fill me-1"></i> + 01 234 567 89</small>
                        
                    </li>

                </ul>
            </div>


            <!-- ! LINKS -->
            <div class="col-12 col-sm-6 col-md-3 me-0 mb-4 text-start">
                <h3 class="mb-3 secondary-text fw-light">Link utili</h3>
                <ul class="list-unstyled">
                    <li class="pb-2 pb-md-3">
                        <small class="white-text">
                            <a href="" class="text-decoration-none footer-link">Assistenza</a>
                        </small>
                    </li>
                    <li class="pb-2 pb-md-3">
                        <small class="white-text">
                            <a href="" class="text-decoration-none footer-link">Privacy</a>
                        </small>
                    </li>
                    <li class="pb-2 pb-md-3">
                        <small class="white-text">
                            <a href="" class="text-decoration-none footer-link">Condizioni</a>
                        </small>
                    </li>
                    <li class="pb-2 pb-md-3">
                        <small class="white-text">
                            <a href="" class="text-decoration-none footer-link">FAQ</a>
                        </small>
                    </li>
                </ul>
            </div>

        </div>

      
    </div>

    <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
        <small class="m-0 p-0">
            © 2025 Copyright:
            <a class="white-text text-rese text-decoration-nonet  fw-bold"
                href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </small>
    </div>
</footer>
