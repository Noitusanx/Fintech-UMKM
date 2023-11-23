{{-- !extend dan content masih belum tepat --}}

@extends('layouts.app') {{-- Sesuaikan dengan layout Blade yang Anda gunakan --}}

@section('content')
<div class="font-poppins sm:px-16 px-6">
    <h1 class="font-bold">Ulasan</h1>
    <div>
        <h2>Beri Rating</h2>
        <div>
            @for ($value = 1; $value <= 5; $value++) <span onclick="handleRatingChange({{ $value }})"
                class="cursor-pointer text-2xl {{ $value <= $rating ? 'text-yellow-500' : 'text-gray-400' }}">
                ★
                </span>
                @endfor
        </div>
    </div>
    <div class="mt-2">
        <h2>Tulis Ulasan</h2>
        <textarea id="review" name="review" class="w-full h-32 p-2 border rounded-md" placeholder="Tulis ulasan Anda..."
            oninput="handleReviewChange(event)">{{ $review }}</textarea>
    </div>
    <div class="flex justify-end mb-5">
        <button onclick="handleSubmitReview()"
            class="mt-4 px-4 py-2 bg-button-gradient rounded-md hover:opacity-70 font-semibold">
            Kirim Ulasan
        </button>
    </div>
</div>

<script>
    function handleRatingChange(value) {
            // Handle perubahan rating di sini jika diperlukan.
            console.log('Rating:', value);
        }

        function handleReviewChange(event) {
            // Handle perubahan ulasan di sini jika diperlukan.
            console.log('Review:', event.target.value);
        }

        function handleSubmitReview() {
            // Kirim ulasan ke server atau lakukan tindakan lainnya jika diperlukan.
            console.log('Rating:', {{ $rating }});
            console.log('Review:', '{{ $review }}');

            // Setelah mengirim ulasan, reset nilai rating dan ulasan.
            handleRatingChange(0);
            document.getElementById('review').value = '';
        }
</script>
@endsection