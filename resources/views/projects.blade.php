<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Projects</h1>
        </div>
    </x-slot>

    <div class="container flex items-center justify-center pt-4 animate__animated animate__bounceInDown">
        <div class="dashboard-card w-7/12 overflow-y-auto">

            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('projects') }}">
                @csrf
                <div class="grid gap-4 grid-cols-3">
                    <div class="col-span-2">
                        <div>
                            <x-label for="title" :value="__('Title')" />
                            <x-input id="title" class="block mt-1 w-full text-smalt-700" type="text" name="title"
                                :value="old('title')" required autofocus />
                        </div>

                        <x-input id="slug" class="block mt-1 w-full disabled:bg-gray-200 text-smalt-700" type="hidden"
                            name="slug" :value="old('slug')" />

                        <div class="mt-3">
                            <x-label for="tags" :value="__('Tags')" />
                            <x-input id="tags" class="block mt-1 w-full text-smalt-700" type="text" name="tags"
                                :value="old('tags')" required />
                        </div>

                        <div class="mt-3">
                            <x-label for="link" :value="__('Link')" />
                            <x-input id="link" class="block mt-1 w-full text-smalt-700" type="text" name="link"
                                :value="old('link')" required />
                        </div>
                    </div>
                    <div class="col-span-1 flex flex-col items-center justify-center space-y-4">
                        <img class="image-display h-32 shadow" src="{{ asset('assets/img/portfolio/choose-img.jpg') }}">
                        <x-label for="image"
                            class="cursor-pointer text-white bg-gradient-to-r from-green-400 to-blue-500 px-3 py-1 tracking-widest rounded transform active:scale-95">
                            <i class='bx bx-upload text-xl'></i> Upload image
                        </x-label>
                        <input id="image" class="mt-3 w-full hidden" type="file" name="image" />
                    </div>
                </div>

                <div class="mt-3">
                    <x-label for="description" :value="__('Description')" />
                    <x-textarea name="description" class="block mt-1 h-52 w-full text-smalt-700 resize-none"
                        id="description" :value="old('description')">
                    </x-textarea>
                </div>

                <div class="flex items-center justify-end mt-8">
                    <x-button
                        class="ml-3 bg-green-500 hover:bg-green-400 transform active:scale-95 active:bg-green-600">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            let title = document.querySelector('#title');
            let slug = document.querySelector('#slug');
            let image = document.querySelector('#image');
            let imageDisplay = document.querySelector('.image-display');
            
            title.addEventListener('keyup', () => {
                slug.value = toUrlSlug(title);
            });
            
            const toUrlSlug = (el) => {
                let slug = el.value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '')
                return slug;
            }

            image.addEventListener('change', () => {
                getImgData(image);
            })
            
            function chooseFile() {
                image.click();
            }

            const getImgData = (image) => {
                const files = image.files[0];
                if (files) {
                    const fileReader = new FileReader();
                    fileReader.readAsDataURL(files);
                    fileReader.addEventListener("load", function () {
                        imageDisplay.src = this.result;
                    });
                }
            }
        </script>
    </x-slot>
</x-app-layout>