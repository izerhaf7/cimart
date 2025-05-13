<div>
    <div class="swiper-container relative bg-white max-w-[448px] mx-auto shadow-md overflow-hidden">
        <!-- Swiper Wrapper -->
        <div class="swiper-wrapper">
            <!-- Static Slide 1 -->


            <!-- Dynamic Slides -->
            @foreach ($data as $item)
                <div class="swiper-slide relative aspect-w-16 aspect-h-9">
                    <!-- Background Image -->
                    <img src="/storage/{{ $item->image_url }}" alt="Banner Image" class="w-full h-full object-cover">
                </div>
            @endforeach
        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper Initialization -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</div>
