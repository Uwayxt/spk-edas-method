@extends('layout.app')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
        <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="absolute p-10 transform bg-blue-500 md:-translate-x-1/2 md:-translate-y-1/2 md:top-1/2 md:left-1/2">
        <div class="max-w-2xl p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-3xl font-bold tracking-tight text-center text-gray-900 sm:text-4xl">Rekomendasi Hasil Keputusan</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">
                <span class="font-bold">Selamat!</span> Berdasarkan preferensi dan data yang Anda berikan, berikut adalah program studi yang paling cocok untuk Anda:
            </p>
            <div class="mt-4">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Program Studi Terbaik untuk Anda:</h3>
                <div class="mt-2">
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Informatika</h4>
                    <p class="text-gray-600 dark:text-gray-400">Cocok untuk Anda yang tertarik dengan teknologi dan pemrograman.</p>
                    <p class="text-gray-600 dark:text-gray-400"><span class="font-semibold">Akreditasi:</span> A</p>
                    <p class="text-gray-600 dark:text-gray-400"><span class="font-semibold">Prospek Karir:</span> Software Engineer, Data Scientist, IT Consultant</p>
                </div>
                <div class="mt-4">
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Manajemen</h4>
                    <p class="text-gray-600 dark:text-gray-400">Ideal bagi Anda yang ingin mengembangkan kemampuan manajerial dan kepemimpinan.</p>
                    <p class="text-gray-600 dark:text-gray-400"><span class="font-semibold">Akreditasi:</span> A</p>
                    <p class="text-gray-600 dark:text-gray-400"><span class="font-semibold">Prospek Karir:</span> Manager, Business Analyst, Entrepreneur</p>
                </div>
                <div class="flex justify-center items-center mt-5">
                    <a class="rounded-full bg-blue-500 text-white font-bold px-5 py-2.5 text-center me-2 mb-2" href="/">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                          </svg>
                          {{-- Kembali --}}
                        </a>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
</div>
@endsection
