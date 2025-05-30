<!DOCTYPE html>
<html lang="en">

<head>
  <!-- GOOGLE -->
  <meta name="google-site-verification" content="E-CWiRntPMXFYasLdqHw-QI9miQb3XNckb81Kr66q2g" />

  <!-- BING MICROSOFT -->
  <meta name="msvalidate.01" content="A4D71A0E2279EF48E367C88291D2E238" />
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>HMTI Kaliabang - Inovatif, Kreatif, Interaktif</title>
  <meta name="description" content="Himpunan Mahasiswa Teknologi Informasi (HMTI) adalah wadah
                aspirasi dan pelayanan bagi mahasiswa Jurusan Teknologi
                Informasi." />
  <meta name="keywords" content="HMTI DPC Kaliabang, HMTI Kaliabang, DPC Kaliabang" />

  <!-- Favicons -->
  <link href="{{ asset('assets/homepage/logo-himpunan.png') }}" rel="icon" />
  <link href="{{ asset('assets/homepage/logo-himpunan.png') }}" rel="apple-touch-icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/homepage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/homepage/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/homepage/vendor/aos/aos.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/homepage/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/homepage/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="{{ asset('assets/homepage/css/main.css') }}" rel="stylesheet" />
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/homepage/logo-himpunan.png') }}" alt="Logo HMTI" />
        {{-- <h1 class="sitename">HMTI</h1> --}}
        <br />
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#" class="active">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <!-- <li><a href="#services">Services</a></li> -->
          <li><a href="#divisi">Divisi</a></li>
          {{-- <li><a href="#team">Tim Kami</a></li> --}}
          <li><a href="#contact">Bengkel IT</a></li>
          <li><a href="join/">Join HMTI</a></li>
          <li><a href="/news">News</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero hehe section dark-background">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Himpunan Mahasiswa Teknologi Informasi</h1>
            <!-- <p>Aktif, Kreatif, Inovatif</p> -->

            <blockquote>
              <span id="typed"></span>
            </blockquote>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Explore!</a>
            </div>
          </div>
          <div class="col-lg-4 order-1 order-lg-2 hero-img ms" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('assets/homepage/logo-himpunan.png') }}" class="animated" alt="Logo HMTI" /><img
              src="{{ asset('assets/homepage/logo-universitas-bina-sarana-informatika-ubsi.png') }}" class="animated"
              alt="Logo UBSI" />
          </div>
        </div>
      </div>
    </section>
    <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 490" xmlns="http://www.w3.org/2000/svg"
      class="transition duration-300 ease-in-out delay-150">
      <style>
        .path-0 {
          animation: pathAnim-0 4s;
          animation-timing-function: linear;
          animation-iteration-count: infinite;
        }

        @keyframes pathAnim-0 {
          0% {
            d: path("M 0,500 L 0,187 C 51.65372724149776,186.47578151837854 103.30745448299552,185.9515630367571 187,171 C 270.6925455170045,156.0484369632429 386.42390930951564,126.66952937135005 449,154 C 511.57609069048436,181.33047062864995 520.9969082789419,265.37031947784266 582,264 C 643.0030917210581,262.62968052215734 755.5884575747166,175.84919271727932 830,159 C 904.4115424252834,142.15080728272068 940.6492614221918,195.23290965304017 1008,222 C 1075.3507385778082,248.76709034695983 1173.8144967365165,249.21916867055992 1251,239 C 1328.1855032634835,228.78083132944008 1384.0927516317417,207.89041566472002 1440,187 L 1440,500 L 0,500 Z"
              );
          }

          25% {
            d: path("M 0,500 L 0,187 C 83.61113019580898,213.02610786671247 167.22226039161797,239.05221573342493 241,228 C 314.77773960838203,216.94778426657507 378.722088629337,168.81724493301272 443,159 C 507.277911370663,149.18275506698728 571.889385091034,177.6788045345242 626,201 C 680.110614908966,224.3211954654758 723.720371006527,242.4675369288904 795,215 C 866.279628993473,187.5324630711096 965.2291308828583,114.45104774991412 1036,115 C 1106.7708691171417,115.54895225008588 1149.3631054620405,189.7282720714531 1212,214 C 1274.6368945379595,238.2717279285469 1357.3184472689798,212.63586396427345 1440,187 L 1440,500 L 0,500 Z"
              );
          }

          50% {
            d: path("M 0,500 L 0,187 C 89.83442116111306,234.89144623840605 179.6688423222261,282.7828924768121 238,261 C 296.3311576777739,239.2171075231879 323.1590518722088,147.75987633115767 394,131 C 464.8409481277912,114.24012366884232 579.6949501889386,172.1776021985572 655,198 C 730.3050498110614,223.8223978014428 766.0611473720371,217.52971487461352 816,201 C 865.9388526279629,184.47028512538648 930.0604603229131,157.70353830298868 995,165 C 1059.939539677087,172.29646169701132 1125.6970113363104,213.6561319134318 1200,223 C 1274.3029886636896,232.3438680865682 1357.1514943318448,209.6719340432841 1440,187 L 1440,500 L 0,500 Z"
              );
          }

          75% {
            d: path("M 0,500 L 0,187 C 87.91068361387838,156.14737203710064 175.82136722775675,125.2947440742013 236,122 C 296.17863277224325,118.7052559257987 328.6252147028513,142.96839574029542 381,160 C 433.3747852971487,177.03160425970458 505.67777396083807,186.83167296461698 586,204 C 666.3222260391619,221.16832703538302 754.6636894537959,245.7049124012367 822,217 C 889.3363105462041,188.2950875987633 935.667468223978,106.34867743043628 993,110 C 1050.332531776022,113.65132256956372 1118.6664376502922,202.90037787701823 1195,230 C 1271.3335623497078,257.09962212298177 1355.666781174854,222.04981106149089 1440,187 L 1440,500 L 0,500 Z"
              );
          }

          100% {
            d: path("M 0,500 L 0,187 C 51.65372724149776,186.47578151837854 103.30745448299552,185.9515630367571 187,171 C 270.6925455170045,156.0484369632429 386.42390930951564,126.66952937135005 449,154 C 511.57609069048436,181.33047062864995 520.9969082789419,265.37031947784266 582,264 C 643.0030917210581,262.62968052215734 755.5884575747166,175.84919271727932 830,159 C 904.4115424252834,142.15080728272068 940.6492614221918,195.23290965304017 1008,222 C 1075.3507385778082,248.76709034695983 1173.8144967365165,249.21916867055992 1251,239 C 1328.1855032634835,228.78083132944008 1384.0927516317417,207.89041566472002 1440,187 L 1440,500 L 0,500 Z"
              );
          }
        }
      </style>
      <defs>
        <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
          <stop offset="5%" stop-color="#6600ff"></stop>
          <stop offset="95%" stop-color="#6600ff"></stop>
        </linearGradient>
      </defs>
      <path
        d="M 0,500 L 0,187 C 51.65372724149776,186.47578151837854 103.30745448299552,185.9515630367571 187,171 C 270.6925455170045,156.0484369632429 386.42390930951564,126.66952937135005 449,154 C 511.57609069048436,181.33047062864995 520.9969082789419,265.37031947784266 582,264 C 643.0030917210581,262.62968052215734 755.5884575747166,175.84919271727932 830,159 C 904.4115424252834,142.15080728272068 940.6492614221918,195.23290965304017 1008,222 C 1075.3507385778082,248.76709034695983 1173.8144967365165,249.21916867055992 1251,239 C 1328.1855032634835,228.78083132944008 1384.0927516317417,207.89041566472002 1440,187 L 1440,500 L 0,500 Z"
        stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1"
        class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 250)"></path>
    </svg>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p style="text-align: justify">
              Himpunan Mahasiswa Teknologi Informasi (HMTI) adalah wadah
              aspirasi dan pelayanan bagi mahasiswa Jurusan Teknologi
              Informasi. HMTI didirikan pada tanggal 02 Februari 2020
              bertempat di Jakarta. Himpunan Mahasiswa Teknologi Informasi
              terbentuk dengan dilatar belakangi oleh kebutuhan mahasiswa
              program studi Teknologi Informasi untuk terciptanya lingkungan
              yang mendukung pengembangan skill mahasiswa pada program studi
              tersebut sebagai calon teknisi dan akademisi aktif yang akan
              turun ke tengah-tengah masyarakat.
            </p>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p style="text-align: justify">
              Terbentuknya HMTI adalah sebagai salah satu wadah organisasi
              yang sangat dibutuhkan oleh seluruh mahasiswa Teknologi
              Informasi Universitas Bina Sarana Informatika untuk mencurahkan
              ide-ide brilian dan mengembangkan kemampuan mereka dalam
              menguasai materi-materi informatika, dan mengembangkan
              kreativitas yang tidak hanya bersifat teoritis, sehingga mereka
              menjadi akademisi yang profesional dan patut diteladani.
            </p>
            <a href="#" class="read-more" data-bs-toggle="modal" data-bs-target="#exampleModal"><span>Lanjut
                Baca</span><i class="bi bi-arrow-right"></i></a>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row gy-4">
                    <div class="col-lg-6">
                      <p style="text-align: justify">
                        Himpunan Mahasiswa Teknologi Informasi (HMTI) adalah
                        wadah aspirasi dan pelayanan bagi mahasiswa Jurusan
                        Teknologi Informasi. HMTI didirikan pada tanggal 02
                        Februari 2020 bertempat di Jakarta. Himpunan Mahasiswa
                        Teknologi Informasi terbentuk dengan dilatar belakangi
                        oleh kebutuhan mahasiswa program studi Teknologi
                        Informasi untuk terciptanya lingkungan yang mendukung
                        pengembangan skill mahasiswa pada program studi
                        tersebut sebagai calon teknisi dan akademisi aktif
                        yang akan turun ke tengah-tengah masyarakat.
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p style="text-align: justify">
                        Terbentuknya HMTI adalah sebagai salah satu wadah
                        organisasi yang sangat dibutuhkan oleh seluruh
                        mahasiswa Teknologi Informasi Universitas Bina Sarana
                        Informatika untuk mencurahkan ide-ide brilian dan
                        mengembangkan kemampuan mereka dalam menguasai
                        materi-materi informatika, dan mengembangkan
                        kreativitas yang tidak hanya bersifat teoritis,
                        sehingga mereka menjadi akademisi yang profesional dan
                        patut diteladani.
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p style="text-align: justify">
                        Memperhatikan realita kemampuan mahasiswa dalam
                        mengelola kepribadian serta kemampuan intelektual
                        dalam sisi akademisi aktif dilingkungan perkuliahan,
                        baik dalam segi teknisi informasi, berkomunikasi atau
                        public speaking dan lain-lain, maka dari itu dengan
                        keinginan luhur dan dukungan dari seluruh mahasiswa
                        Teknologi Informasi Universitas Bina Sarana
                        Informatika memutuskan satu kesepakatan untuk
                        membentuk sebuah organisasi yang bernama HMTI sebagai
                        wadah diskusi mahasiswa Teknologi Informasi dan
                        pengembangan softskill secara produktif.
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p style="text-align: justify">
                        HMTI bertempat di Universitas Bina Sarana Informatika
                        Kramat di Jl. Kramat Raya No. 98 RT.18/RW.1, Paseban,
                        kecamatan Senen, Kota Jakarta pusat, Daerah Khusus
                        Ibukota Jakarta 10420.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us light-background" data-builder="section">
      <div class="container-fluid">
        <div class="row gy-4">
          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">
            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3>
                <strong>Visi, Misi</strong>
              </h3>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
              <div class="faq-item faq-active">
                <h3>Visi</h3>
                <div class="faq-content">
                  <p>
                    Menjadikan HMTI sebagai wadah aspirasi dan pelayanan demi
                    mewujudkan mahasiswa teknologi informasi yang aktif,
                    kreatif, kompetitif, bertanggungjawab, dan berwawasan luas
                    agar mampu bersaing dalam perkembangan teknologi.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->

              <div class="faq-item">
                <h3>Misi</h3>
                <div class="faq-content">
                  <p>
                    1. Meningkatkan kontribusi HMTI kepada lingkungan kampus
                    serta masyarakat luas terutama dibidang Teknologi
                    Informasi.
                    <br />
                    2. Menciptakan prestasi atau akademisi yang kreatif dan
                    inovatif dari berbagai aspek, baik akademik ataupun non
                    akademik.
                    <br />
                    3. Menanamkan sikap disiplin dan bertanggung jawab dalam
                    berorganisasi kepada setiap anggota.
                    <br />
                    4. Menciptakan ikatan yang kuat dan rasa memiliki terhadap
                    himpunan serta menjadikan HMTI sebagai keluarga.
                    <br />
                    5. Menjalin hubungan baik dan kerja sama dengan organisasi
                    mahasiswa lainnya serta menjaga nama baik himpunan dan
                    almamater.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
            <img src="{{ asset('assets/homepage/img/skills.png') }}" class="img-fluid" alt="" data-aos="zoom-in"
              data-aos-delay="100" />
          </div>

          <div class="col-lg-12">
            <div class="counter-section d-flex flex-row align-items-center justify-content-center my-4">
              <div class="counter-item">
                <h1 id="num1" class="counter-number">0</h1>
                <!-- Initial value set to 0 -->
                <h3 class="counter-label">Proker</h3>
              </div>
              <div class="counter-item">
                <h1 id="num2" class="counter-number">0</h1>
                <!-- Initial value set to 0 -->
                <h3 class="counter-label">Divisi</h3>
              </div>
              <div class="counter-item">
                <h1 id="num3" class="counter-number">0</h1>
                <!-- Initial value set to 0 -->
                <h3 class="counter-label">Anggota</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Why Us Section -->

    <!-- Services Section -->
    <section id="divisi" class="services section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Divisi HMTI</h2>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week icon"></i>
              </div>
              <h4>
                <a href="kominfo/" class="stretched-link">Divisi Kominfo</a>
              </h4>
              <p>
                Divisi Komunikasi dan Informasi (Kominfo) adalah divisi yang
                bertugas dalam bidang komunikasi, publikasi, dan penyebaran
                informasi.
              </p>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-megaphone"></i>
              </div>
              <h4>
                <a href="psdm/" class="stretched-link">Divisi PSDM</a>
              </h4>
              <p>
                Divisi Pengembangan Sumber Daya Mahasiswa (PSDM) adalah divisi
                yang bertugas untuk mengembangkan sumber daya mahasiswa di
                berbagai organisasi.
              </p>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-info-circle"></i>
              </div>
              <h4>
                <a href="litbang/" class="stretched-link">Divisi Litbang</a>
              </h4>
              <p>
                Divisi litbang atau divisi penelitian dan pengembangan adalah
                divisi yang bertugas melakukan penelitian, pengembangan, dan
                publikasi.
              </p>
            </div>
          </div>
          <!-- End Service Item -->
        </div>
      </div>
    </section>
    <!-- /Services Section -->

    {{--
    <!-- Team Section -->
    <section id="team" class="team section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Struktur Organisasi HMTI</h2>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic">
                <a href="assets/img/team/therima.jpg" title="Therima" data-gallery="portfolio-gallery-app"
                  class="glightbox preview-link">
                  <img src="assets/img/team/therima.jpg" class="img-fluid" alt="" />
                </a>
              </div>
              <div class="member-info">
                <h4>Therima</h4>
                <span>Ketua DPC Kaliabang</span>
                <!-- <p>
                    Explicabo voluptatem mollitia et repellat qui dolorum quasi
                  </p> -->
                <div class="social">
                  <a href="https://www.instagram.com/therima_ndr/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member d-flex align-items-start">
              <div class="pic">
                <a href="assets/img/team/ega.jpg" title="Ega Ernanda" data-gallery="portfolio-gallery-app"
                  class="glightbox preview-link">
                  <img src="assets/img/team/ega.jpg" class="img-fluid" alt="" />
                </a>
              </div>
              <div class="member-info">
                <h4>Ega Ernanda</h4>
                <span>Sekretaris Jendral</span>
                <!-- <p>
                    Aut maiores voluptates amet et quis praesentium qui senda
                    para
                  </p> -->
                <div class="social">
                  <a href="https://www.instagram.com/eggrnnd_
/" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member d-flex align-items-start">
              <div class="pic">
                <a href="assets/img/team/idris.jpg" title="Idris Haidir Ali" data-gallery="portfolio-gallery-app"
                  class="glightbox preview-link">
                  <img src="assets/img/team/idris.jpg" class="img-fluid" alt="" />
                </a>
              </div>
              <div class="member-info">
                <h4>Idris Haidir Ali</h4>
                <span>Bendahara</span>
                <!-- <p>
                    Quisquam facilis cum velit laborum corrupti fuga rerum quia
                  </p> -->
                <div class="social">
                  <a href="https://instagram.com/idris_haidir" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex align-items-start">
              <div class="pic">
                <a href="assets/img/team/jabal.jpg" title="Ismail Jabal Haq" data-gallery="portfolio-gallery-app"
                  class="glightbox preview-link">
                  <img src="assets/img/team/jabal.jpg" class="img-fluid" alt="" />
                </a>
              </div>
              <div class="member-info">
                <h4>Ismail Jabal Haq</h4>
                <span>Ketua Divisi Kominfo</span>
                <!-- <p>
                    Dolorum tempora officiis odit laborum officiis et et
                    accusamus
                  </p> -->
                <div class="social">
                  <a href="https://instagram.com/jabal_haq09" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex align-items-start">
              <div class="pic">
                <a href="assets/img/team/dika.jpg" title="Mahardika Iskandar" data-gallery="portfolio-gallery-app"
                  class="glightbox preview-link">
                  <img src="assets/img/team/dika.jpg" class="img-fluid" alt="" />
                </a>
              </div>
              <div class="member-info">
                <h4>Mahardika Iskandar</h4>
                <span>Ketua Divisi Litbang</span>
                <!-- <p>
                    Dolorum tempora officiis odit laborum officiis et et
                    accusamus
                  </p> -->
                <div class="social">
                  <a href="https://instagram.com/dik.jong"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex align-items-start">
              <div class="pic">
                <a href="assets/img/team/adit.jpg" title="Aditiya Saputra" data-gallery="portfolio-gallery-app"
                  class="glightbox preview-link">
                  <img src="assets/img/team/adit.jpg" class="img-fluid" alt="" />
                </a>
              </div>
              <div class="member-info">
                <h4>Aditiya Saputra</h4>
                <span>Ketua Divisi PSDM</span>
                <!-- <p>
                    Dolorum tempora officiis odit laborum officiis et et
                    accusamus
                  </p> -->
                <div class="social">
                  <a href="https://instagram.com/_sptrraa_" target="_blank">
                    <i class="bi bi-instagram"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Team Member -->
        </div>
      </div>
    </section>
    <!-- /Team Section --> --}}

    <!-- Faq 2 Section -->
    <section id="faq-2" class="faq-2 section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pertanyaan yang Sering Diajukan</h2>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="faq-container">
              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>
                  Apa saja peluang karir yang bisa didapatkan setelah lulus
                  dari jurusan Teknologi Informasi?
                </h3>
                <div class="faq-content">
                  <p>
                    Lulusan jurusan Teknologi Informasi memiliki banyak
                    peluang karir, termasuk posisi sebagai administrator
                    sistem, analis data, pengembang perangkat lunak, spesialis
                    keamanan siber, manajer TI, dan konsultan teknologi.
                    Permintaan yang terus meningkat akan solusi digital dan
                    manajemen data memastikan bahwa profesional TI dapat
                    menemukan berbagai jalur karir yang menjanjikan di
                    berbagai industri.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>
                  Bagaimana jurusan Teknologi Informasi mendukung inovasi dan
                  kreativitas?
                </h3>
                <div class="faq-content">
                  <p>
                    Jurusan Teknologi Informasi menawarkan banyak kesempatan
                    untuk berinovasi dan berkreasi. Mahasiswa dapat terlibat
                    dalam pengembangan sistem informasi yang efisien, desain
                    arsitektur jaringan, atau penerapan teknologi terbaru
                    seperti kecerdasan buatan (AI) dan Internet of Things
                    (IoT). Misalnya, dalam pengembangan aplikasi bisnis,
                    mahasiswa dapat merancang solusi kreatif untuk
                    meningkatkan proses operasional dan pengalaman pengguna.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>
                  Apakah gaji di bidang Teknologi Informasi kompetitif
                  dibandingkan dengan bidang lainnya?
                </h3>
                <div class="faq-content">
                  <p>
                    Ya, gaji di bidang Teknologi Informasi cenderung sangat
                    kompetitif. Posisi seperti analis data, manajer TI, dan
                    spesialis keamanan siber sering kali mendapatkan
                    kompensasi yang menarik, mengingat keterampilan teknis
                    yang dibutuhkan dan permintaan yang tinggi untuk
                    profesional TI. Gaji yang kompetitif ini mencerminkan
                    nilai strategis dari keahlian TI dalam mendukung dan
                    mengelola infrastruktur teknologi yang penting bagi
                    organisasi.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>
                  Seberapa fleksibel pekerjaan di bidang Teknologi Informasi?
                </h3>
                <div class="faq-content">
                  <p>
                    Banyak pekerjaan di bidang Teknologi Informasi menawarkan
                    fleksibilitas tinggi, seperti opsi untuk bekerja dari
                    jarak jauh, jam kerja yang fleksibel, atau sistem kerja
                    hybrid. Misalnya, seorang pengembang perangkat lunak atau
                    spesialis jaringan sering kali dapat melakukan pekerjaan
                    mereka dari lokasi yang berbeda asalkan mereka memiliki
                    akses ke infrastruktur yang diperlukan. Fleksibilitas ini
                    memungkinkan karyawan TI untuk menyesuaikan jadwal kerja
                    dengan kebutuhan pribadi mereka.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>
                  Bagaimana peran Teknologi Informasi dalam transformasi
                  digital?
                </h3>
                <div class="faq-content">
                  <p>
                    Teknologi Informasi berperan penting dalam transformasi
                    digital dengan menyediakan alat dan solusi yang
                    memungkinkan organisasi untuk mengoptimalkan operasi
                    mereka dan beradaptasi dengan perubahan teknologi. Ini
                    termasuk pengembangan dan penerapan sistem informasi yang
                    mendukung otomatisasi, analisis data besar, dan integrasi
                    berbagai platform digital. Misalnya, sistem manajemen
                    hubungan pelanggan (CRM) dan solusi berbasis cloud
                    membantu perusahaan dalam meningkatkan efisiensi
                    operasional dan pengalaman pelanggan.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>
                  Apa yang membedakan jurusan Teknologi Informasi dari jurusan
                  lain dalam konteks perkembangan karir?
                </h3>
                <div class="faq-content">
                  <p>
                    Jurusan Teknologi Informasi sering kali membedakan dirinya
                    dengan fokus pada pengelolaan dan penerapan solusi
                    teknologi yang mendukung berbagai aspek operasional
                    bisnis. Sementara jurusan lain mungkin lebih fokus pada
                    teori atau konsep spesifik, Teknologi Informasi
                    berorientasi pada penerapan praktis dan solusi yang dapat
                    langsung diterapkan dalam lingkungan bisnis. Hal ini
                    memungkinkan lulusan untuk terlibat langsung dalam
                    pengembangan dan pengelolaan sistem yang penting bagi
                    keberhasilan organisasi.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <!-- End Faq item-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Faq 2 Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Bengkel IT</h2>
        <p>
          Punya keluhan mengenai install ulang, install aplikasi, dan masalah
          lainnya? Yuk, isi kolom dibawah ini untuk hubungi kami:
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-12">
            <form class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">
                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Nama Lengkap:</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="" />
                </div>

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Merk Laptop:</label>
                  <input type="text" name="name" id="merk-field" class="form-control" required="" />
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Keluhan:</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">
                    Your message has been sent. Thank you!
                  </div>

                  <button type="submit" onclick="send()">Send Message</button>
                </div>
              </div>
            </form>
          </div>
          <!-- End Contact Form -->
        </div>
      </div>
    </section>
    <!-- /Contact Section -->
  </main>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <img src="{{ asset('assets/homepage/logo-himpunan.png') }}" alt="Logo HMTI" height="80" />
            <span class="ms-4 sitename">HMTI</span>
          </a>
          <div class="footer-contact mt-5">
            <p>Jl. Raya Kaliabang N0.8 Perwira Bekasi Utara 17142 Bekasi</p>
            <p>West Java, Indonesia West Java</p>
            <p class="mt-3">
              <strong>Telp:</strong> <span>+62 21 88985633</span>
            </p>
            <p>
              <strong>Email:</strong>
              <span>hmti.kaliabang@gmail.com</span>
            </p>
          </div>
        </div>

        <div class="col-lg-2 col-md-12 mt-5">
          <h4>About:</h4>
          <div class="footer-links d-flex flex-column">
            <a href="https://www.bsi.ac.id/indexkoe_yht.php" target="_blank">BSI Universitas</a>
            <a href="https://pusatinformasi.kampusmerdeka.kemdikbud.go.id/hc/id" target="_blank">Kampus Merdeka</a>
          </div>
        </div>

        <div class="col-lg-2 col-md-12 mt-5">
          <h4>Follow Us:</h4>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href="https://www.instagram.com/hmti.kaliabang/"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>
        © <span>2025</span>
        <strong class="px-1 sitename">HMTI Kaliabang,</strong>
        <span>All Rights Reserved.</span>
      </p>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/homepage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/homepage/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/homepage/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/homepage/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/homepage/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/homepage/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/homepage/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/homepage/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/homepage/vendor/typeitjs/typeitjs.js') }}"></script>
  <script src="{{ asset('assets/homepage/vendor/count-me/count-me.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/homepage/js/main.js') }}"></script>
  <script src="{{ asset('assets/homepage/js/bengkel-it.js') }}"></script>
</body>

</html>