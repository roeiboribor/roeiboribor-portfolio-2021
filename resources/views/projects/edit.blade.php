<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Projects</h1>
        </div>
    </x-slot>

    @if (session('status'))
    <x-alert-toast @click.away="hideToast()" class="{{ session('status')=='success' ? 'bg-green-600': 'bg-red-600' }}
                    fixed top-16 right-0">
        {{ session('status') == 'success'
        ? 'Project has been successfully Updated!'
        : 'An error has occured please try again!' }}
    </x-alert-toast>
    @endif

    <div x-data="{isLoader: false}"
        class="container flex items-center justify-center pt-4 animate__animated animate__bounceInDown">
        <div class="relative dashboard-card w-7/12 overflow-y-auto">

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            {{-- LOADING ICON --}}
            <div :class="{'flex': isLoader,'hidden': ! isLoader}"
                class="hidden overlay bg-black bg-opacity-30 z-10 items-center justify-center">
                <i class='bx bx-loader-circle animate-spin text-9xl'></i>
            </div>

            <form method="POST" action="{{ route('projects.update',$project->slug) }}" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 grid-cols-3">
                    <div class="col-span-2">
                        <div>
                            <x-label for="title" :value="__('Title')" />
                            <x-input id="title" @keyup="convertToSlug()" class="block mt-1 w-full text-smalt-700"
                                type="text" name="title" :value="$project->title" placeholder="ex. Project Title..."
                                required autofocus />
                        </div>

                        <x-input id="slug" class="mt-1 w-full disabled:bg-gray-200 text-smalt-700 hidden" type="text"
                            name="slug" :value="$project->slug" required />

                        <div class="mt-3">
                            <x-label for="tags" :value="__('Tags')" />
                            {{-- tagsToArray($event.target.value) --}}
                            <x-input @keydown="$event.key === ',' ? tagsToArray($event.target.value) : ''"
                                @keyup.backspace="tagsToArray($event.target.value)" @click.away="" id="tags"
                                class="block mt-1 w-full text-smalt-700" type="text" name="tags" :value="$project->tags"
                                placeholder="ex. HTML, CSS, JavaScirpt, ..." required />
                            <div class="tags-container mt-2 px-0.5 space-x-0.5">
                            </div>
                        </div>

                        <div class="mt-3">
                            <x-label for="link" :value="__('Link')" />
                            <x-input id="link" class="block mt-1 w-full text-smalt-700" type="text" name="link"
                                :value="$project->link" placeholder="ex. https://example.com" required />
                        </div>
                    </div>
                    <div class="col-span-1 flex flex-col items-center justify-center space-y-4">
                        <img class="image-display h-32 shadow"
                            src="{{ asset('assets/img/portfolio/projects/'.$project->image) }}">
                        <x-label for="image"
                            class="cursor-pointer text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 px-3 py-1 tracking-widest rounded transition transform active:scale-95 shadow hover:shadow-md">
                            <i class='bx bx-upload text-xl'></i> Upload image
                        </x-label>
                        <input id="image" class="mt-3 w-full hidden" type="file"
                            accept="image/png, image/jpeg, image/jpg" name="image" />
                    </div>
                </div>

                <div class="mt-3">
                    <x-label for="description" :value="__('Description')" />
                    <x-textarea name="description" class="block mt-1 h-52 w-full text-smalt-700 resize-none"
                        id="description" :value="$project->description"
                        placeholder="Type brief description of the project..." required>
                    </x-textarea>
                </div>

                <div class="flex items-center justify-center mt-8">
                    <x-button @click="isLoader = validateForm()"
                        class="ml-3 bg-green-500 hover:bg-green-400 transform active:scale-95 active:bg-green-600 hover:shadow-md shadow">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            let tags = document.querySelector('#tags');
            let tagsContainer = document.querySelector('.tags-container');
            let image = document.querySelector('#image');
            let imageDisplay = document.querySelector('.image-display');

            const tagsToArray = (el) => {
                let wordTags = el.split(', ');
                tagsContainer.innerHTML = null;
                wordTags.forEach(wordTag => {
                    if (wordTag !== '') {
                        tagsContainer.innerHTML += `
                        <span class="text-xs rounded-full px-2 py-0.5 text-gray-100 bg-smalt-200 shadow">${wordTag}</span>
                        `;
                    }
                });  
            }

            const validateForm = () => {
                convertToSlug();
                const requiredInputs = document.querySelectorAll('[required]');
                const image = document.querySelector('#image');
                let hasEmptyInput = true;
                requiredInputs.forEach(requiredInput => {
                    if(requiredInput.value =='') {
                        hasEmptyInput = false;
                    }
                });

                if(image.value == '') {
                    hasEmptyInput = false;
                }

                return hasEmptyInput;
            }

            const hideToast = () => {
                const alertToast = document.querySelector('.alert-toast');
                alertToast.classList.add('animate-fade-out-right');
            }
            
            const convertToSlug = () => {
                const title = document.querySelector('#title');
                const slug = document.querySelector('#slug');

                slug.value = title.value
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'');
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

            validateForm();
        </script>
    </x-slot>
</x-app-layout>