<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Products</h1>
        </div>
    </x-slot>

    @if (session('status'))
    <x-alert-toast @click.away="hideToast()" class="{{ session('status')=='success' ? 'bg-red-400': 'bg-red-600' }}
                        fixed top-16 right-0">
        {{ session('status') == 'success'
        ? 'Product has been successfully Deleted!'
        : 'An error has occured please try again!' }}
    </x-alert-toast>
    @endif

    <div :class="{'pt-4': open,'pt-0': ! open}"
        class="container flex items-center justify-center pt-4 animate__animated animate__bounceInDown">
        <div class="dashboard-card w-full relative">
            <form method="GET" action="{{ route('products.index') }}">
                <div class="relative w-4/12 flex items-center mx-auto">
                    <x-input id="search" class="block ml-1 w-full text-smalt-700 pr-16" type="search" name="search"
                        :value="$oldSearch ?? ''" placeholder="search..." />
                    <x-button
                        class="absolute right-0.5 bg-smalt-300 hover:bg-smalt-200 transform active:scale-95 active:bg-smalt-400">
                        <i class='bx bx-search-alt text-xl'></i>
                    </x-button>
                </div>
            </form>

            <div class="absolute top-4 left-4">
                <x-a-button href="{{ route('products.create') }}"
                    class="bg-green-500 hover:bg-green-400 transform active:scale-95 active:bg-green-600 hover:shadow-md shadow">
                    <i class='bx bx-edit text-xl mr-3'></i> Add New Product
                </x-a-button>
            </div>

            <div class="mt-8 mb-4">
                <table class="table-fixed w-full rounded">
                    <thead class="bg-gradient-to-r from-green-400 to-blue-500 shadow-md">
                        <tr>
                            <th class="border-r-2 w-4/12">name</th>
                            <th class="border-r-2 w-4/12">Category</th>
                            <th class="border-r-2 w-full">Description</th>
                            <th class="border-r-2 w-3/12">Product Price</th>
                            <th class="border-r-2 w-3/12">Selling Price</th>
                            <th class="border-r-2 w-3/12">Quantity</th>
                            <th class="w-4/12">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="border-b-2 h-14">
                            <td class="p-2 text-center">
                                <small>
                                    {{ $product->product_name }}
                                </small>
                            </td>
                            <td class="p-2 text-center">
                                <small>
                                    {{ $product->category }}
                                </small>
                            </td>
                            <td class="p-2 text-center">
                                <small @click="toggleExpand($event.target)" class="cursor-pointer line-clamp-3">
                                    {{ $product->description }}
                                </small>
                            </td>
                            <td class="p-2 text-center">
                                <small>
                                    {{ $product->product_price }}
                                </small>
                            </td>
                            <td class="p-2 text-center">
                                <small>
                                    {{ $product->selling_price }}
                                </small>
                            </td>
                            <td class="p-2 text-center">
                                <small>
                                    {{ $product->quantity }}
                                </small>
                            </td>
                            <td class="relative">
                                <div class="absolute flex items-center justify-evenly inset-0">
                                    <x-a-button href="{{ route('products.edit',$product->slug) }}"
                                        class="bg-smalt-200 hover:bg-smalt-100 transform active:scale-95 active:bg-smalt-400 hover:shadow-md shadow">
                                        <i class='bx bx-edit text-lg'></i>
                                    </x-a-button>
                                    <x-button
                                        @click="showModal = !showModal, slug = '{{ route('products.destroy',$product->slug) }}'"
                                        class="bg-red-500 hover:bg-red-400 transform active:scale-95 active:bg-red-600 hover:shadow-md shadow">
                                        <i class='bx bx-trash text-lg'></i>
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-slot name="modal">
        <x-modal>
            <x-slot name="title">
                {{ __('⚠️ Warning!!⚠️') }}
            </x-slot>

            <p class="text-center my-8">Are you sure you want to delete the product?</p>

            <x-slot name="buttons">
                {{-- --}}
                <form method="POST" :action="slug">
                    @csrf
                    @method('DELETE')
                    <x-button @click="showModal = !showModal"
                        class="bg-red-500 hover:bg-red-400 transform active:scale-95 active:bg-red-600 hover:shadow-md shadow">
                        {{ __('Delete') }}
                    </x-button>
                </form>
                <x-button @click="showModal = !showModal"
                    class="bg-smalt-200 hover:bg-smalt-100 transform active:scale-95 active:bg-smalt-300 hover:shadow-md shadow">
                    {{ __('Cancel') }}
                </x-button>
            </x-slot>
        </x-modal>
    </x-slot>

    <x-slot name="scripts">
        <script>
            const toggleExpand = (el) => {
                el.classList.toggle('line-clamp-3');
            }

            const hideToast = () => {
                const alertToast = document.querySelector('.alert-toast');
                alertToast.classList.add('animate-fade-out-right');
            }
        </script>
    </x-slot>
</x-app-layout>