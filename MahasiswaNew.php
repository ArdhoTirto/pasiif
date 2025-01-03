<?php
$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <style>
        .container_mhs {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 50vh;
        }

        .wrapper {
            align-items: center;
            background: #fff;
            width: 90%;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.4);
            background: linear-gradient(#D5A3FF 0%, #77A5F8);
            position: relative;
        }

        h2 {
            text-align: center;
            color: #fff;
            font-size: 50px;
        }

        hr {
            width: 100px;
            margin: 10px auto;
            color: black;
        }

        .members {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .team-mem {
            margin: 8px;
            text-align: center;
        }

        #img_mhs {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 10px;
            object-fit: cover;
        }

        h4,
        #ket {
            font-size: 12px;
            margin: 7px;
            color: #fff;
        }

        .swiper-mahasiswa-container {
            width: 100%;
            height: auto;
            overflow: hidden; 
        }

        .swiper-wrapper {
            display: flex;
        }

        .swiper-slide {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .swiper-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            transition: background 0.3s ease;
        }

        .swiper-button:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .swiper-button-prev {
            left: 10px;
        }

        .swiper-button-next {
            right: 10px;
        }

        .swiper-button-prev::after {
            content: "\276E"; 
            font-size: 18px;
        }

        .swiper-button-next::after {
            content: "\276F"; 
            font-size: 18px;
        }

        .swiper-mahasiswa-pagination-bullet {
            background: #fff;
        }
    </style>
</head>
<body>

<div class="container_mhs">
    <div class="wrapper">
        <h2>Mahasiswa</h2>
        <hr>
        <div class="swiper-mahasiswa-container">
            <div class="swiper-wrapper">
                <?php 
                $count = 0;
                if (mysqli_num_rows($mahasiswa) > 0): 
                    while ($p = mysqli_fetch_array($mahasiswa)): 
                        // Buka slide baru setiap 20 anggota
                        if ($count % 20 === 0): ?>
                            <div class="swiper-slide swiper-mahasiswa-slide">
                                <div class="members">
                        <?php endif; ?>
                        
                        <div class="team-mem">
                            <img id="img_mhs" src="uploads/peserta/<?= $p['gambar'] ?>" alt="Foto Mahasiswa">
                            <h4><?= htmlspecialchars($p['nama_mhs'], ENT_QUOTES, 'UTF-8') ?></h4>
                            <p id="ket"><?= htmlspecialchars($p['nim'], ENT_QUOTES, 'UTF-8') ?></p>
                        </div>

                        <?php 
                        $count++;
                        // Tutup slide jika mencapai 20 anggota
                        if ($count % 20 === 0 || $count === mysqli_num_rows($mahasiswa)): ?>
                                </div> <!-- .members -->
                            </div> 
                        <?php endif; 
                    endwhile; 
                else: ?>
                    <p>Tidak ada data</p>
                <?php endif; ?>
            </div> 

          
            <div class="swiper-mahasiswa-pagination"></div>
            <div class="swiper-button swiper-button-prev"></div>
            <div class="swiper-button swiper-button-next"></div>
        </div> 
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    // Inisialisasi Swiper
    const swiperMahasiswa = new Swiper('.swiper-mahasiswa-container', {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-mahasiswa-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

</body>
</html>
