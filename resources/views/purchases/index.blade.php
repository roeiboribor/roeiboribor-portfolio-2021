<x-app-layout>

    <x-slot name="header">
        <div
            class="pl-5 pr-10 py-2 text-gray-100 bg-gradient-to-r from-green-400 to-blue-500 rounded-r-full animate__animated animate__fadeInLeft">
            <h1 class="text-3xl font-bold">Purchase Order</h1>
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