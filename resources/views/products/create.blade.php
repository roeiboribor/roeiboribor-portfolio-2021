<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Products</h1>
        </div>
    </x-slot>

    @if (session('status'))
    <x-alert-toast @click.away="hideToast()" class="{{ session('status')=='success' ? 'bg-green-600': 'bg-red-600' }}
                    fixed top-16 right-0">
        {{ session('status') == 'success'
        ? session('message')
        : session('message') }}
    </x-alert-toast>
    @endif

    <div x-data="{isLoader: false}"
        class="container flex items-center justify-center pt-8 animate__animated animate__bounceInDown">
        <div class="relative dashboard-card w-8/12 overflow-y-auto">

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            {{-- LOADING ICON --}}
            <div :class="{'flex': isLoader,'hidden': ! isLoader}"
                class="hidden overlay bg-black bg-opacity-30 z-10 items-center justify-center">
                <i class='bx bx-loader-circle animate-spin text-9xl'></i>
            </div>

            <form method="POST" action="{{ route('products.store') }}">
                @csrf
                <div class="grid gap-x-4 grid-cols-3 pt-3">
                    <div class="col-span-2">
                        <div>
                            <x-label for="productName" :value="__('Product Name')" />
                            <x-input @keyup="convertToSlug()" id="productName" class="block mt-1 w-full text-smalt-700"
                                type="text" name="product_name" autocomplete="off" :value="old('product_name')" required
                                autofocus />
                        </div>

                        <x-input id="slug" class="mt-1 w-full disabled:bg-gray-200 text-smalt-700" type="hidden"
                            name="slug" :value="old('slug')" required />

                        <div class="mt-3">
                            <x-label for="description" :value="__('Description')" />
                            <x-textarea name="description" class="mt-1 h-48 w-full text-smalt-700 resize-none"
                                id="description" :value="old('description')" required>
                            </x-textarea>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <div>
                            <x-label for="category" :value="__('Category')" />
                            <x-select id="category" class="block mt-1 w-full text-smalt-700" name="category"
                                :required="true" autofocus>
                                <option class="text-center" value="">
                                    {{ __('--- Select Category ---') }}
                                </option>
                                @foreach ($categories as $category)
                                <option value="{{ $category }}" {{ old('category')==$category ? 'selected' :'' }}>
                                    {{ $category }}
                                </option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="mt-3 relative">
                            <x-label for="productPrice" :value="__('Product Price')" />
                            <x-input onkeypress="return isDecimalInput(this, event);" id="productPrice"
                                class="pl-16 pr-4 text-right block mt-1 w-full text-smalt-700" type="text"
                                name="product_price" autocomplete="off" :value="old('product_price')" placeholder="0.00"
                                required autofocus />
                            <span class="absolute bottom-2 left-4 text-smalt-700 text-xl font-bold">₱</span>
                        </div>
                        @if (Auth::user()->role == "super")
                        <div class="mt-2 relative">
                            <x-label for="sellingPrice" :value="__('Selling Price')" />
                            <x-input onkeypress="return isDecimalInput(this, event);" id="sellingPrice"
                                class="pl-16 pr-4 text-right block mt-1 w-full text-smalt-700" type="text"
                                name="selling_price" autocomplete="off" :value="old('selling_price')" placeholder="0.00"
                                required autofocus />
                            <span class="absolute bottom-2 left-4 text-smalt-700 text-xl font-bold">₱</span>
                        </div>
                        @endif

                        <div class="mt-2">
                            <x-label for="quantity" :value="__('Quantity')" />
                            <div class="flex items-center">
                                <x-input id="quantity" autocomplete="off"
                                    class="block mx-4 order-2 text-center mt-1 w-full text-smalt-700" type="text"
                                    name="quantity" :value="old('quantity')" placeholder="0" required autofocus />
                                <div class="order-3">
                                    <button id="btnAdd" type="button"
                                        class="bg-smalt-200 transform active:scale-95 active:bg-smalt-300 shadow flex items-center p-1 rounded text-white">
                                        <i class='bx bx-plus text-lg font-extrabold'></i>
                                    </button>
                                </div>
                                <div class="order-1">
                                    <button id="btnMinus" type="button"
                                        class="bg-smalt-200 transform active:scale-95 active:bg-smalt-300 shadow flex items-center p-1 rounded text-white">
                                        <i class='bx bx-minus text-lg font-extrabold'></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-span-3">
                        <div class="flex items-center justify-center mt-4">
                            <x-button @click="isLoader = validateForm()"
                                class="bg-green-500 w-1/3 justify-center hover:bg-green-400 transform active:scale-95 active:bg-green-600 hover:shadow-md shadow">
                                <i class='bx bx-save text-xl mr-4'></i> {{ __('Save') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            const btnAdd = document.querySelector('#btnAdd');
            const btnMinus = document.querySelector('#btnMinus');
            const quantity = document.querySelector('#quantity');

            const validateForm = () => {
                convertToSlug();
                const requiredInputs = document.querySelectorAll('[required]');
                const productPrice = document.querySelector('#productPrice');
                const sellingPrice = document.querySelector('#sellingPrice');
                const category = document.querySelector('#category');

                let hasEmptyInput = true;

                productPrice.value = productPrice.value ? parseFloat(productPrice.value).toFixed(2) : '';
                sellingPrice.value = sellingPrice.value ? parseFloat(sellingPrice.value).toFixed(2) : '';

                requiredInputs.forEach(requiredInput => {
                    if(requiredInput.value =='' || requiredInput.value == 0) {
                        hasEmptyInput = false;
                    }
                });

                return hasEmptyInput;
            }

            const isDecimalInput = (txt, evt) => {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode == 46) {
                    //Check if the text already contains the . character
                    return (txt.value.indexOf('.') === -1) ? true : false;
                } else {
                    return (charCode > 31 && (charCode < 48 || charCode> 57)) ? false : true;
                }
                return true;
            }

            btnAdd.addEventListener('click', () => {
                quantity.value++; 
            })
            btnMinus.addEventListener('click', () => {
                quantity.value == 0 ? quantity.value = 0 : quantity.value--;
            })

            const hideToast = () => {
                const alertToast = document.querySelector('.alert-toast');
                alertToast.classList.add('animate-fade-out-right');
            }
            
            const convertToSlug = () => {
                const productName = document.querySelector('#productName');
                const slug = document.querySelector('#slug');
                
                slug.value = productName.value
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'');
            }

            validateForm();
        </script>
    </x-slot>
</x-app-layout>