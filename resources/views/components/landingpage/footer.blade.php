<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 footer-contact">
                    <h4>Hubungi Kami</h4>
                    <p>
                        Hubungi kami jika anda memiliki pertanyaan<br><br>
                        <strong>Telp:</strong> {{ $school->nomor_telpon }}<br>
                        <strong>Email:</strong> {{ $school->email }}<br>
                    </p>

                </div>

                <div class="col-lg-6 col-md-6 footer-info">
                    <h3 class="text-uppercase">{{ $school->nama }}</h3>
                    <p>Sosial Media Kami </p>
                    <div class="social-links mt-3">
                        @if ($school->facebook != null)
                            <a href="https://facebook.com/{{ $school->facebook }}" class="twitter">
                                <i class="bx bxl-facebook"></i>
                            </a>
                        @endif
                        @if ($school->email != null)
                            <a href="mailto:{{ $school->email }}" class="facebook">
                                <i class="bx bxl-gmail"></i>
                            </a>
                        @endif
                        @if ($school->instagram != null)
                            <a href="www.instagram.com/{{ $school->instagram }}" class="instagram">
                                <i class="bx bxl-instagram"></i>
                            </a>
                        @endif
                        @if ($school->whatsapp != null)
                            <a href="https://wa.me/62{{ $school->whatsapp }}" class="google-plus">
                                <i class="bx bxl-whatsapp"></i>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Eterna</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>
