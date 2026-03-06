function loadPage(page){
    fetch(page)
    .then(response => {
        if (!response.ok) throw new Error('File tidak ditemukan');
        return response.text();
    })
    .then(data => {
        document.getElementById("main-content").innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById("main-content").innerHTML = "Halaman gagal dimuat.";
    });
}