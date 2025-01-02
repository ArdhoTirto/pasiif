<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/styles_1.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  
    <!-- Sidebar Start -->
    <?php include 'sidebar.php'?>
    <!--  Sidebar End -->
    
    <!--Pop Up-->
    <div class="modal__container" id="modal-container">
      <div class="modal__content">
        

        <!-- Tombol Close Modal -->
        <div class="modal__close close-modal" title="Close">
          <i class="bx bx-x"></i>
        </div>
        <!-- Gambar Modal -->
        <img class="rounded-circle flex-shrink-0" src="../../uploads/pengguna/<?= $p['gambar'] ?>" alt="" style="width: 40px; height: 40px;">
        
        <!-- Nama -->
      
        <h1 class="modal__title" id="profile-name"><?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>)</h1>

        <!-- No HP -->
        <p class="modal__description" id="profile-phone">No HP</p>

        <!-- Lokasi -->
        <p class="modal__description" id="profile-location">Lokasi</p>

        <!-- Tombol Close -->
        <button class="modal__button modal__button-width close-modal">
          Close
        </button>
      </div>
    </div>

    <!--  Main wrapper -->
    <div class="body-wrapper">

      <!--  Header Start -->
      <?php include 'header.php' ?>
      <!--  Header End -->

      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
              <div class="d-sm-flex d-block align-items-center justify-content-between mb-12">
                <main class="table" id="customers_table">
                  
                  <!--tabel header  -->
                  <section class="table__header">
                    <h1>Admin</h1>
                      <div class="input-group">
                        <input type="search" class="form-control" placeholder="Search Data...">
                      </div>
                  </section>

                  <!-- tabel body -->
                  <section class="table__body">
                    <table>
                      <thead>
                        <tr>
                          <th id="th_no">No <span class="icon-arrow">&UpArrow;</span></th>
                          <th scope="col">Name <span class="icon-arrow">&UpArrow;</span></th>
                          <th scope="col">Location <span class="icon-arrow">&UpArrow;</span></th>
                          <th scope="col">No. Hp <span class="icon-arrow">&UpArrow;</span></th>
                          <th scope="col">Level <span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                      </thead>
                        <tbody>
                          <?php
                            $no = 1;

                            $where = " WHERE 1=1 ";
                            if(isset($_GET['key'])){
                              $where .= " AND nama LIKE '%".addslashes($_GET['key'])."%' ";
                            }

                            $pengguna = mysqli_query($conn, "SELECT * FROM pengguna $where ORDER BY id DESC");
                            if(mysqli_num_rows($pengguna) > 0){
                              while($p = mysqli_fetch_array($pengguna)){
                          ?> 
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><img class="rounded-circle flex-shrink-0" src="../../uploads/pengguna/<?= $p['gambar'] ?>" alt="" style="width: 40px; height: 40px;"> <?= $p['nama_pengguna'] ?> </td>
                            <td><?= $p['location'] ?></td>
                            <td><?= $p['no_hp'] ?></td>

                            <?php
                              if($p['level'] == "Admin"):
                            ?>

                            <td>
                              <p class="status delivered"><?= $p['level'] ?></p>
                            </td>

                            <?php else : ?>
    
                            <td>
                              <p class="status pending"><?= $p['level'] ?></p>
                            </td>
                                
                            <?php endif; ?>

                            </tr>
                              <?php }}else{ ?>
                            <tr>
                              <td colspan="5">Data tidak ada</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                  </section>
                </main>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="row">     
              <div class="col-lg-12">
                <!-- Monthly Earnings -->
                <div class="card h-52">
                  <div class="card-body">                  
                    <div class="card bg-primary text-white text-center p-3">
                      <img class="rounded-circle flex-shrink-0 mx-auto d-block mb-3" src="../assets/images/profile/user-1.jpg" alt="" style="width: 40px; height: 40px;">
                      <blockquote class="blockquote mb-2">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                        <footer class="blockquote-footer text-white">
                          <small>
                            Someone famous in <cite title="Source Title">Source Title</cite>
                          </small>
                        </footer>
                      </blockquote>
                      <button class="modal__button" id="open-modal" >View Profile</button>
                                <div class="modal__container" id="modal-container">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">$36,358</h4>
                        <div class="d-flex align-items-center mb-3">
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                          <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        
          <div class="card_1">
            <div class="search">
              <input type="text" placeholder="enter city name" 
              spellcheck="false" >
              <button><img src="../assets/images/search.png"></button>
            </div>
            <div class="error">
              <p>Invalid city name</p>
            </div>
            <div class="weather">
              <img src="images/rain.png" class="weather-icon">
              <h1 class="temp">22°c</h1>
              <h2 class="city">New York</h2>
            <div class="details">
              <div class="col">
                <img src="../assets/images/humidity.png">
                <div>
                  <p class="humidity">50%</p>
                  <p>Humidity</p>
                </div>
              </div>
              <div class="col">
                <img src="../assets/images/wind.png">
                <div>
                  <p class="wind">15 km/h</p>
                  <p>Wind Speed</p>
                </div>
              </div>
            </div>
          </div>
    </div>

        <!-- row 2 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                
              </div>
            </div>
          </div>
        </div>

        <!-- row 3 -->
        <div class="row">
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0">$50 <span class="ms-2 fw-normal text-muted fs-3"><del>$65</del></span></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)"><img src="../assets/images/products/s5.jpg" class="card-img-top rounded-0" alt="..."></a>
                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">MacBook Air Pro</h6>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0">$650 <span class="ms-2 fw-normal text-muted fs-3"><del>$900</del></span></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)"><img src="../assets/images/products/s7.jpg" class="card-img-top rounded-0" alt="..."></a>
                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Red Valvet Dress</h6>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0">$150 <span class="ms-2 fw-normal text-muted fs-3"><del>$200</del></span></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)"><img src="../assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Cute Soft Teddybear</h6>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0">$285 <span class="ms-2 fw-normal text-muted fs-3"><del>$345</del></span></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- footer -->
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Copyright &copy; 2024 - Pasiif</p>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/script.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script>

const apiKey = "e4d3252e775868ed9c51b985f72bc96c";
const apiUrl = "https://api.openweathermap.org/data/2.5/weather?&units=metric&q=";
const geoApiUrl = "https://api.openweathermap.org/data/2.5/weather?&units=metric";

// Selektor elemen HTML
const searchBox = document.querySelector(".search input");
const searchBtn = document.querySelector(".search button");
const weatherIcon = document.querySelector(".weather-icon");

// Fungsi untuk menampilkan cuaca berdasarkan nama kota
async function checkWeather(city) {
    try {
        const response = await fetch(`${apiUrl}${city}&appid=${apiKey}`);
        if (response.ok) {
            const data = await response.json();

            // Menyimpan data ke localStorage
            localStorage.setItem("lastCity", city);
            localStorage.setItem("weatherData", JSON.stringify(data));

            updateWeatherUI(data);
        } else {
            document.querySelector(".weather").style.display = "none";
            alert("City not found!");
        }
    } catch (error) {
        console.error("Error fetching weather data:", error);
    }
}

// Fungsi untuk menampilkan cuaca berdasarkan lokasi (latitude dan longitude)
async function checkWeatherByLocation(lat, lon) {
    try {
        const response = await fetch(`${geoApiUrl}&lat=${lat}&lon=${lon}&appid=${apiKey}`);
        if (response.ok) {
            const data = await response.json();

            // Menyimpan data ke localStorage
            localStorage.setItem("lastCity", data.name);
            localStorage.setItem("weatherData", JSON.stringify(data));

            updateWeatherUI(data);
        } else {
            document.querySelector(".weather").style.display = "none";
            alert("Unable to fetch weather for your location!");
        }
    } catch (error) {
        console.error("Error fetching weather data:", error);
    }
}

// Fungsi untuk memperbarui UI cuaca
function updateWeatherUI(data) {
    document.querySelector(".city").innerHTML = data.name;
    document.querySelector(".temp").innerHTML = Math.round(data.main.temp) + "°c";
    document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
    document.querySelector(".wind").innerHTML = data.wind.speed + " km/h";

    // Menyesuaikan ikon cuaca
    if (data.weather[0].main == "Clouds") {
        weatherIcon.src = "images/clouds.png";
    } else if (data.weather[0].main == "Clear") {
        weatherIcon.src = "images/clear.png";
    } else if (data.weather[0].main == "Rain") {
        weatherIcon.src = "images/rain.png";
    } else if (data.weather[0].main == "Drizzle") {
        weatherIcon.src = "images/drizzle.png";
    } else if (data.weather[0].main == "Mist") {
        weatherIcon.src = "images/mist.png";
    }

    document.querySelector(".weather").style.display = "block";
}

// Event klik tombol pencarian
searchBtn.addEventListener("click", () => {
    const city = searchBox.value.trim(); // Pastikan input tidak kosong
    if (city) {
        checkWeather(city);
    } else {
        alert("Please enter a city name!");
    }
});

// Saat halaman di-load, periksa localStorage atau tampilkan cuaca berdasarkan lokasi terkini
window.onload = () => {
    const lastCity = localStorage.getItem("lastCity");
    const weatherData = localStorage.getItem("weatherData");

    if (navigator.geolocation) {
        // Jika Geolocation tersedia, gunakan lokasi pengguna
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                // Perbarui cuaca berdasarkan lokasi pengguna
                checkWeatherByLocation(lat, lon);
            },
            (error) => {
                console.error("Geolocation error:", error);
                // Jika gagal mendapatkan lokasi, gunakan data terakhir atau default
                if (lastCity && weatherData) {
                    searchBox.value = lastCity; // Menampilkan nama kota di input
                    updateWeatherUI(JSON.parse(weatherData)); // Memperbarui UI
                } else {
                    // Jika tidak ada data terakhir, gunakan Jakarta sebagai default
                    const defaultCity = "Jakarta";
                    searchBox.value = defaultCity;
                    checkWeather(defaultCity);
                }
            }
        );
    } else {
        // Jika Geolocation tidak tersedia, gunakan data terakhir atau default
        if (lastCity && weatherData) {
            searchBox.value = lastCity; // Menampilkan nama kota di input
            updateWeatherUI(JSON.parse(weatherData)); // Memperbarui UI
        } else {
            // Jika tidak ada data terakhir, gunakan Jakarta sebagai default
            const defaultCity = "Jakarta";
            searchBox.value = defaultCity;
            checkWeather(defaultCity);
        }
    }
};
/*=============== SHOW MODAL ===============*/
const showModal = (openButton, modalContent) =>{
    const openBtn = document.getElementById(openButton),
    modalContainer = document.getElementById(modalContent)
    
    if(openBtn && modalContainer){
        openBtn.addEventListener('click', ()=>{
            modalContainer.classList.add('show-modal')
        })
    }
}

showModal('open-modal','modal-container')

/*=============== CLOSE MODAL ===============*/
const closeBtn = document.querySelectorAll('.close-modal')

function closeModal(){
    const modalContainer = document.getElementById('modal-container')
    modalContainer.classList.remove('show-modal')
}
closeBtn.forEach(c => c.addEventListener('click', closeModal))

  </script>

</body>

</html>
