<x-app-layout>
    <!-- Article Header -->
    <br>
        <div class="max-w-[448px] mx-auto px-4 py-6">
            <h1 class="text-3xl font-extrabold text-gray-900 text-center">
                {{$data->title}} <!-- Replace with dynamic article title -->
            </h1>

            <!-- Article Meta Info -->
            <div class="mt-2 text-sm text-gray-600 text-center">
                By <span class="font-semibold">Admin</span>
                <!-- Replace with dynamic info -->
            </div>

            <!-- Article Featured Image -->
            <div class="my-6">
                <img src="/storage/{{$data->image_url}}" alt="Article Image" class="w-full h-auto object-cover rounded-md">
            </div>

            <!-- Article Content -->
            <div class="prose max-w-none text-gray-800">
                {!!$data->text!!}
                <!-- Add your content paragraphs here -->
            </div>
        </div>
        <br>
        <br>
        <!-- Sidebar for Related Articles -->


        {{-- <!-- Sidebar Section (Optional Author Bio or Any Other Section) -->
        <aside class="max-w-[448px] mx-auto px-4 py-6 bg-gray-100 rounded-md">
            <h3 class="font-semibold text-gray-700 mb-3">About the Author</h3>
            <div class="flex datas-center">
                <img src="https://picsum.photos/100/100" alt="Author Image" class="w-16 h-16 rounded-full mr-4">
                <div>
                    <p class="text-gray-800">Author Name</p>
                    <p class="text-sm text-gray-600">Short bio about the author goes here.</p>
                </div>
            </div>
        </aside> --}}
    
</x-app-layout>
