<div>
    <div class="swiper-container relative bg-white max-w-[448px] mx-auto shadow-md overflow-hidden">
        <!-- Swiper Wrapper -->
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide relative aspect-w-16 aspect-h-9">
                <!-- Background Image -->
                <img src="banner.jpg" alt="Hero Background 1" class="w-full h-full object-cover">
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide relative aspect-w-16 aspect-h-9">
                <!-- Background Image -->
                <img src="banner2.jpg" alt="Hero Background 2" class="w-full h-full object-cover">
            </div>
            @for ($i = 0; $i < 5; $i++)
            <div class="swiper-slide relative aspect-w-16 aspect-h-9">
                <!-- Background Image -->
                <img src="banner2.jpg" alt="Hero Background 2" class="w-full h-full object-cover">
            </div>
            @endfor


            <!-- Slide 3 -->

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
