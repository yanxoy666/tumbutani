<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
       <link rel="stylesheet" href="style.css">
       <link rel="stylesheet" href="assets/css/image-resize.css">
       <link rel="stylesheet" href="assets/css/produk.css">
</head>
<body>
  <div id="navbar"></div>
<section class="filosofi-logo-section">

  <h3 class="produk-title">
      Produk Dari TumbuTani.Nusantara
    <span></span>
  </h3>

</h2>

<section class="produk-section">
  <div class="produk-container">





  <?php
    include "config/koneksi.php";

    $query = mysqli_query($conn,"SELECT * FROM produk");

     while($data = mysqli_fetch_assoc($query)){
  ?>

      <div class="card">

        <div class="img-wrap">
          <img src="assets/img/produk/<?php echo $data['gambar']; ?>">
        </div>

         <h2><?php echo $data['nama_produk']; ?></h2>

      <p>
        <?php echo substr($data['deskripsi'],0,120); ?>...
      </p>

        <div class="price">
          Rp <?php echo number_format($data['harga']); ?>
        </div>

        <a href="#" class="btn detail-btn"
            data-title="<?php echo $data['nama_produk']; ?>"
            data-image="assets/img/produk/<?php echo $data['gambar']; ?>"
            data-desc="<?php echo $data['deskripsi']; ?>"
            data-price="Rp <?php echo number_format($data['harga']); ?>">
            Detail
        </a>

      </div>

    <?php } ?>
    <!-- Produk 1
    <div class="card">
      <div class="img-wrap">
        <img src="assets/img/semangka.jpg" alt="Premino">
      </div>
      
      <h2>Semangka</h2>
      <p>
       Semangka (Citrullus lanatus) adalah tanaman buah merambat dari suku labu-labuan (Cucurbitaceae) yang berasal dari Afrika. 
       Dikenal karena buahnya yang besar, berair (sekitar 92% air), dan manis, semangka menjadi camilan populer saat musim panas. 
      </p>
      <div class="price">Rp 75.000</div>
      <a href="#" class="btn detail-btn"
        data-title="Semangka"
        data-image="assets/img/semangka.jpg"
        data-desc="Semangka (Citrullus lanatus) adalah tanaman buah merambat dari suku labu-labuan (Cucurbitaceae) yang berasal dari Afrika."
        data-price="Rp 75.000">
        Detail
      </a>
    </div>
    

    Produk 2
    <div class="card">
        <div class="img-wrap">
        <img src="assets/img/cabai.jpg" alt="Premino">
      </div>
      <h2>Cabai</h2>
      <p>
        Cabai adalah buah dan tumbuhan anggota genus Capsicum (keluarga Solanaceae atau terong-terongan) yang terkenal karena rasa pedasnya, berasal dari Amerika Tropis. Secara botani, cabai diklasifikasikan sebagai buah karena memiliki biji dan tumbuh dari bunga.
      </p>
      <div class="price">Rp 75.000</div>
      <a href="#" class="btn detail-btn"
        data-title="Cabai"
        data-image="assets/img/cabai.jpg"
        data-desc="Cabai adalah buah dan tumbuhan anggota genus Capsicum yang terkenal karena rasa pedasnya dan berasal dari Amerika Tropis."
        data-price="Rp 75.000">
          Detail
        </a>
    </div>

    Produk 3 
    <div class="card">
        <div class="img-wrap">
        <img src="assets/img/pupuk.jpg" alt="Premino">
      </div>
      <h2>CAL-HA</h2>
      <p>
        Cal-Ha adalah pupuk kalsium plus asam humat berbentuk serbuk (CaO + 
 + Asam Humat) yang efektif mencegah rontok bunga/buah, busuk ujung buah, dan mengatasi stres tanaman. Pupuk ini memperkuat dinding sel, sdan merangsang akar, cocok diaplikasikan via kocor (4-5g/liter) atau semprot
      </p>
      <div class="price">Rp 75.000</div>
      <a href="#" class="btn detail-btn"
        data-title="CAL-HA"
        data-image="assets/img/pupuk.jpg"
        data-desc="Cal-Ha adalah pupuk kalsium plus asam humat berbentuk serbuk yang efektif mencegah rontok bunga, busuk ujung buah, dan meningkatkan kekuatan tanaman."
        data-price="Rp 75.000">
          Detail
        </a>
      </div>
  </div>-->

<!-- modal jeung detail -->
<div id="modalDetail" class="modal">
  <div class="modal-content">
    
    <span class="close">&times;</span>

    <div class="modal-body">
      
      <div class="modal-img">
        <img id="modalImage" src="" alt="">
      </div>

      <div class="modal-info">
        <h2 id="modalTitle"></h2>
        <p id="modalDesc"></p>
        <div id="modalPrice" class="modal-price"></div>

        <button id="btnBukaForm" class="btn-beli">Beli</button>

        <!-- FORM PEMBELIAN -->
        <form id="formPesanan" method="POST" action="proses_pesan.php" style="display:none; margin-top:20px;">
          
          <input type="hidden" name="produk" id="inputProduk">
          <input type="hidden" name="harga" id="inputHarga">

          <input type="text" name="nama" placeholder="Nama Pembeli" required>
          <input type="text" name="telepon" placeholder="Nomor Telepon" required>
          <textarea name="alamat" placeholder="Alamat Tujuan" required></textarea>
          <input type="number" name="jumlah" placeholder="Jumlah Pembelian" min="1" required>

          <button type="submit" class="btn-submit">
            Beli Sekarang
          </button>
        </form>

      </div>
    </div>

  </div>
</div>

</section>
<footer class="footer-pro">
  <div class="footer-container">

    <!-- KOLOM 1 -->
    <div class="footer-col about">
      <img src="https://ugc.production.linktr.ee/a7b80433-be7e-4b9b-8e8a-80348120588f_2d07dbedeccd5530edff1f19b74ed481-tplv-tiktokx-cropcenter-1080-1080.jpeg?io=true&size=avatar-v3_0" alt="Logo" class="footer-logo">
      <p>
        Produsen penyedia aneka macam pupuk, produk-produk
        pertanian dan perkebunan.
      </p>

      <div class="footer-social">
        <a href="https://www.facebook.com/profile.php?id=61575866347115&ref=PROFILE_EDIT_ig_profile_ac" class="s fb">f</a>
        <a href="https://www.instagram.com/tumbutani.nusantara/" class="s ig">ig</a>
        <a href="https://www.tiktok.com/@tumbutani.nusantara" class="s tt">tt</a>
        <a href="https://api.whatsapp.com/send/?phone=6282260067197&text=Halo+Tumbutani+Nusantara&type=phone_number&app_absent=0" class="s yt">💬</a>
      </div>
    </div>

    <!-- KOLOM 2 -->
    <style>
      .footer-menu a {
        color: inherit;       
        text-decoration: none; 
        display: block;       
        padding: 5px 0;      
      }
      
      .footer-menu a:hover {
        color: #ff6600;       
      }
      </style>
      
      <div class="footer-col">
        <h3>Navigasi</h3>
        <ul class="footer-menu">
          <li><a href="index.html">› Home</a></li>
          <li><a href="tentang.html">› Tentang Kami</a></li>
          <li><a href="produk.html">› Produk</a></li>
          <li><a href="galeri.html">› Galeri</a></li>
          <li><a href="mitra.html">› Mitra</a></li>
        </ul>
      </div>

    <!-- KOLOM 3 -->
    <div class="footer-col">
      <h3>Alamat & Kontak</h3>
      <p>📍 Batusumur, Kec. Manonjaya, Kabupaten Tasikmalaya, Jawa Barat 46197</p>
      <p>📞 0822-6006-7197</p>
      <p>💬 0822-6006-7197</p>
      <p>✉️ tumbutaninusantara@gmail.com</p>
    </div>

  </div>

  <!-- COPYRIGHT -->
  <div class="footer-bottom">
    ©2022 – 2025. TumbuTani.Nusantara | Powered by IT Alomani Team®
  </div>

    <!--memanggil navbar-->
  <script src="assets/js/navbar.js"></script>
  
  <script>
    const modal = document.getElementById("modalDetail");
    const modalImage = document.getElementById("modalImage");
    const modalTitle = document.getElementById("modalTitle");
    const modalDesc = document.getElementById("modalDesc");
    const modalPrice = document.getElementById("modalPrice");
    
    const inputProduk = document.getElementById("inputProduk");
    const inputHarga = document.getElementById("inputHarga");
    
    const btnBukaForm = document.getElementById("btnBukaForm");
    const formPesanan = document.getElementById("formPesanan");
    
    document.querySelectorAll(".detail-btn").forEach(button => {
      button.addEventListener("click", function(e) {
        e.preventDefault();
    
        modalImage.src = this.dataset.image;
        modalTitle.textContent = this.dataset.title;
        modalDesc.textContent = this.dataset.desc;
        modalPrice.textContent = this.dataset.price;
    
        inputProduk.value = this.dataset.title;
        inputHarga.value = this.dataset.price;
    
        modal.style.display = "block";
      });
    });
    
    btnBukaForm.addEventListener("click", function() {
    btnBukaForm.style.display = "none";
    formPesanan.style.display = "block";
    });
    
    document.querySelector(".close").onclick = function() {
    modal.style.display = "none";
    formPesanan.style.display = "none";
    btnBukaForm.style.display = "block";
};
    </script>