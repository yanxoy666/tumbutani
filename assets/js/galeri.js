document.addEventListener("DOMContentLoaded", () => {

const items = [
  { src: 'assets/img/Panencabai.png', title: 'Panen Bersama', desc: 'Cabai segar berkualitas tinggi' },
  { src: 'assets/img/lahan.png', title: 'Lahan Pertanian', desc: 'Lahan subur modern' },
  { src: 'assets/img/petanimenanam.png', title: 'Kegiatan Petani', desc: 'Proses penanaman' },
  { src: 'assets/img/Lahan2.png', title: 'Siap Panen', desc: 'Hasil optimal' },
];

let cur = 0;

window.openLb = (i) => {
  cur = i;
  document.getElementById('lb').classList.add('open');
  document.getElementById('lbImg').src = items[i].src;
  document.getElementById('lbTitle').textContent = items[i].title;
  document.getElementById('lbDesc').textContent = items[i].desc;
};

window.closeLb = (e) => {
  if (!e || e.target.id === 'lb') {
    document.getElementById('lb').classList.remove('open');
  }
};

window.openVideo = () => {
  document.getElementById('videoLb').classList.add('open');
  document.getElementById('videoPlayer').play();
};

window.closeVideo = (e) => {
  if (!e || e.target.id === 'videoLb') {
    document.getElementById('videoLb').classList.remove('open');
    document.getElementById('videoPlayer').pause();
  }
};

window.filterGaleri = (btn, cat) => {
  document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');

  document.querySelectorAll('.galeri-item').forEach(item => {
    item.style.display = (cat === 'all' || item.dataset.cat === cat) ? '' : 'none';
  });
};

});

// Data Galeri (Simulasi Database)
const galeriData = [
    { title: "Panen Bersama", desc: "Cabai segar berkualitas tinggi", src: "assets/img/Panencabai.png" },
    { title: "Lahan Pertanian", desc: "Lahan subur modern", src: "assets/img/lahan.png" },
    { title: "Kegiatan Petani", desc: "Proses penanaman", src: "assets/img/petanimenanam.png" },
    { title: "Siap Panen", desc: "Hasil optimal", src: "assets/img/Lahan2.png" }
];

// 1. Fungsi Filter Modern
function filterGaleri(btn, category) {
    // Ganti class active
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // Animasi Grid
    const items = document.querySelectorAll('.galeri-item');
    items.forEach(item => {
        item.style.transform = "scale(0.8)";
        item.style.opacity = "0";
        
        setTimeout(() => {
            if (category === 'all' || item.getAttribute('data-cat') === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.transform = "scale(1)";
                    item.style.opacity = "1";
                }, 50);
            } else {
                item.style.display = 'none';
            }
        }, 300);
    });
}

// 2. Fungsi Lightbox Gambar
function openLb(index) {
    const data = galeriData[index];
    const lb = document.getElementById('lb');
    document.getElementById('lbImg').src = data.src;
    document.getElementById('lbTitle').innerText = data.title;
    document.getElementById('lbDesc').innerText = data.desc;
    
    lb.style.display = 'flex';
    document.body.style.overflow = 'hidden'; // Stop scroll
}

function closeLb(e) {
    if (e && e.target.id !== 'lb' && e.target.className !== 'lb-close') return;
    document.getElementById('lb').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// 3. Fungsi Video
function openVideo() {
    const vlb = document.getElementById('videoLb');
    vlb.style.display = 'flex';
    document.getElementById('videoPlayer').play();
}

function closeVideo(e) {
    if (e && e.target.id !== 'videoLb' && e.target.className !== 'lb-close') return;
    const vlb = document.getElementById('videoLb');
    document.getElementById('videoPlayer').pause();
    vlb.style.display = 'none';
}

// Tambahkan efek reveal saat scroll
const observerOptions = {
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            // Delay berurutan (stagger)
            setTimeout(() => {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
            }, index * 100); 
        }
    });
}, observerOptions);

document.querySelectorAll('.galeri-item').forEach(item => {
    item.style.opacity = "0";
    item.style.transform = "translateY(30px)";
    item.style.transition = "all 0.8s cubic-bezier(0.22, 1, 0.36, 1)";
    observer.observe(item);
});

// Perbaikan Filter dengan Animasi Halus
function filterGaleri(btn, category) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const items = document.querySelectorAll('.galeri-item');
    
    items.forEach(item => {
        const isMatch = category === 'all' || item.getAttribute('data-cat') === category;
        
        if (isMatch) {
            item.style.display = 'block';
            setTimeout(() => {
                item.style.opacity = "1";
                item.style.transform = "scale(1)";
            }, 10);
        } else {
            item.style.opacity = "0";
            item.style.transform = "scale(0.8)";
            setTimeout(() => {
                item.style.display = 'none';
            }, 400);
        }
    });
}
