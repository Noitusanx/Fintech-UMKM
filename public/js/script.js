// update nama file dari gambar produk ketika dilakukan input
function updateSelectedFileName(input) {
    document.getElementById('selectedFileName').innerText = input.files[0].name;
}

document.addEventListener("DOMContentLoaded", function () {
    var toggleButton = document.getElementById("toggleButton");
    var sidebar = document.getElementById("sidebar");

    toggleButton.addEventListener("click", function () {
        sidebar.classList.toggle("hidden");
    });
});

// document.addEventListener('DOMContentLoaded', function () {
//     // Tampilkan semua produk saat halaman dimuat
//     var productItems = document.querySelectorAll('.bg-white.rounded-lg.product-shadow');
    
//     // Tangani klik pada tombol filter
//     var filterButtons = document.querySelectorAll('.filter-button');
//     filterButtons.forEach(function (button) {
//         button.addEventListener('click', function () {
//             var selectedCategory = button.dataset.filter;

//             // Sembunyikan semua produk
//             productItems.forEach(function (item) {
//                 item.style.display = 'none';
//             });

//             // Tampilkan produk dengan kategori yang dipilih
//             if (selectedCategory === 'Seluruhnya') {
//                 // Jika tombol "Seluruhnya" diklik, tampilkan semua produk dan biarkan urutan default
//                 productItems.forEach(function (item) {
//                     item.style.display = 'block';
//                 });
//             } else {
//                 // Jika kategori lain yang dipilih, tampilkan produk dengan kategori tersebut
//                 var selectedCategoryItems = document.querySelectorAll('.bg-white.rounded-lg.product-shadow[data-category="' + selectedCategory + '"]');
                
//                 // Susun ulang elemen produk untuk menempatkan produk di paling kiri
//                 selectedCategoryItems.forEach(function (item) {
//                     // Pindahkan elemen ke posisi paling kiri
//                     item.style.display = 'block';
//                     // Masukkan elemen di posisi paling kiri dalam container (gunakan parentElement sesuai dengan struktur HTML)
//                     item.parentElement.prepend(item);
//                 });
//             }
//         });
//     });
// });

// document.addEventListener('DOMContentLoaded', function () {
//     // Tampilkan semua produk saat halaman dimuat
//     var productItems = document.querySelectorAll('.bg-white.rounded-lg.product-shadow');

//     // Tangani klik pada tombol filter
//     var filterButtons = document.querySelectorAll('.filter-button');
//     filterButtons.forEach(function (button) {
//         button.addEventListener('click', function () {
//             var selectedCategory = button.dataset.filter;

//             // Sembunyikan semua produk
//             productItems.forEach(function (item) {
//                 item.style.display = 'none';
//             });

//             // Tampilkan produk dengan kategori yang dipilih
//             if (selectedCategory === 'Seluruhnya') {
//                 // Jika tombol "Seluruhnya" diklik, tampilkan semua produk dan biarkan urutan default
//                 productItems.forEach(function (item) {
//                     item.style.display = 'block';
//                 });
//             } else {
//                 // Jika kategori lain yang dipilih, tampilkan produk dengan kategori tersebut
//                 var selectedCategoryItems = document.querySelectorAll('.bg-white.rounded-lg.product-shadow[data-category="' + selectedCategory + '"]');
                
//                 // Susun ulang elemen produk untuk menempatkan produk di paling kiri
//                 selectedCategoryItems.forEach(function (item) {
//                     // Pindahkan elemen ke posisi paling kiri
//                     item.style.display = 'block';
//                     // Masukkan elemen di posisi paling kiri dalam container (gunakan parentElement sesuai dengan struktur HTML)
//                     item.parentElement.insertBefore(item, item.parentElement.firstElementChild);
//                 });
//             }
//         });
//     });
// });


function filterSelection(category) {
    var products = document.getElementsByClassName('product');

    for (var i = 0; i < products.length; i++) {
        if (category === 'all' || products[i].getAttribute('data-category') === category) {
            products[i].style.display = 'block';
        } else {
            products[i].style.display = 'none';
        }
    }
}

function toggleDropdown() {
  var dropdown = document.getElementById("dropdown");
  dropdown.classList.toggle("hidden");
}
