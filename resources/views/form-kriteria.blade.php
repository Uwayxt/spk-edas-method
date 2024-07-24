@extends('layout.app')

@section('content')
<div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
      <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Isi Formulir</h2>
      <p class="mt-2 text-lg leading-8 text-gray-600"><span class="font-bold">Harap isi form ini sebagai pemicu pemilihan program studi nantinya. Pastikan untuk memasukkan semua informasi yang diperlukan dengan benar.</p>
    </div>
    <form action="{{ route('student.create') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">

        @csrf
        <input type="text" value="{{ $name }}" hidden>
        <input type="text" value="{{ $school_address }}" hidden>
        <input type="text" value="{{ $major_id }}" hidden>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
          <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Nama Lengkap</label>
          <div class="mt-2.5">
            <input type="text" name="company" id="company" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
          </div>
        </div>
      </div>
      <div class="mt-10 sm:col-span-2 flex flex-row gap-4">
        <a href="/biodata?name={{ $name }}&school_address={{ $school_address }}&major_id={{ $major_id }}" class="rounded-md block w-full text-center px-3.5 py-2.5 text-sm font-semibold text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Sebelumnya</a>
        <a href="/" class="rounded-md block w-full text-center bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Selanjutnya</a>
      </div>
    </form>
  </div>


@endsection
