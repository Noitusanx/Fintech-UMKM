// update nama file dari gambar produk ketika dilakukan input
function updateSelectedFileName(input) {
    document.getElementById('selectedFileName').innerText = input.files[0].name;
}

document.addEventListener('DOMContentLoaded', function() {
  // Tampilkan semua produk saat halaman dimuat
  var productItems = document.querySelectorAll('.bg-white.rounded-lg.product-shadow');
  productItems.forEach(function(item) {
      item.style.display = 'block';
  });

  // Tangani klik pada tombol filter
  var filterButtons = document.querySelectorAll('.filter-button');
  filterButtons.forEach(function(button) {
      button.addEventListener('click', function() {
          var selectedCategory = button.dataset.filter;

          // Sembunyikan semua produk
          productItems.forEach(function(item) {
              item.style.display = 'none';
          });

          // Tampilkan produk dengan kategori yang dipilih
          if (selectedCategory === 'Semua') {
              productItems.forEach(function(item) {
                  item.style.display = 'block';
              });
          } else {
              var selectedCategoryItems = document.querySelectorAll('.bg-white.rounded-lg.product-shadow[data-category="' + selectedCategory + '"]');
              selectedCategoryItems.forEach(function(item) {
                  item.style.display = 'block';
              });
          }
      });
  });
});




function toggleDropdown() {
  var dropdown = document.getElementById("dropdown");
  dropdown.classList.toggle("hidden");
}
