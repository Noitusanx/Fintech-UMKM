<form action="{{ url('produk/' . $product->id . '/detail') }}" method="post">
    @csrf
    <div class="my-3">
        <label for="exampleFormControlTextarea1">Rating Produk</label>
        <div class="penilaian">
            <span>
                <input type="radio" id="star5a" data-product-id="@Model.ProductId" class="star" name="rate" value="5" />
                <label for="star5a" title="5 Stars" class="{{ $averageRating >= 5 ? 'active' : 'inactive' }}"></label>
                <input type="radio" id="star4a" data-product-id="@Model.ProductId" class="star" name="rate" value="4" />
                <label for="star4a" title="4 Star" class="{{ $averageRating >= 5 ? 'active' : 'inactive' }}"></label>
                <input type="radio" id="star3a" data-product-id="@Model.ProductId" class="star" name="rate" value="3" />
                <label for="star3a" title="3 Star" class="{{ $averageRating >= 5 ? 'active' : 'inactive' }}"></label>
                <input type="radio" id="star2a" data-product-id="@Model.ProductId" class="star" name="rate" value="2" />
                <label for="star2a" title="2 Stars" class="{{ $averageRating >= 5 ? 'active' : 'inactive' }}"></label>
                <input type="radio" id="star1a" data-product-id="@Model.ProductId" class="star" name="rate" value="1" />
                <label for="star1a" title="1 Star" class="{{ $averageRating >= 5 ? 'active' : 'inactive' }}"></label>
                <input type="hidden" name="selected_rating" id="selected_rating" value="0">
            </span>
        </div>
        <label for="" class="">Ulasan</label>
        <div class="mt-2 py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:border-gray-700">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" name="ulasan" rows="6"
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:placeholder-gray-400"
                placeholder="Ketik ulasan..."></textarea>
        </div>
        <div class="flex items-center justify-end mt-4 sm:mt-6">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-semibold text-center text-black rounded-lg bg-button-gradient focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:opacity-70">
                Buat Ulasan
            </button>
        </div>

    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('selected_rating');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const value = this.getAttribute('value');
                ratingInput.value = value;

                // Set warna bintang sesuai dengan rating yang dipilih
                stars.forEach(s => {
                    const starValue = s.getAttribute('value');
                    s.classList.toggle('active', starValue <= value);
                });
            });
        });
    });
</script>