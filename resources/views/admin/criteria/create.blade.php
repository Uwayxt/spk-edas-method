@extends('layout.app')

@section('content')

<x-navbar></x-navbar>

  <x-sidebar></x-sidebar>
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"></h2>
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Kriteria</h2>
        <form action={{ route('criteria.store') }} method="POST">
            @csrf
            <div class="flex flex-col gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kriteria</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Mata Pelajaran" required="">
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bobot Kriteria</label>
                    <input type="text" name="weight" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0.3" required="">
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                    <select id="category" required name="major_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected value="">Pilih Jurusan</option>
                        <option value="all">Semua Jurusan</option>
                        @foreach ($major as $item)
                         <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                Tambah Kriteria
            </button>
        </form>
    </div>
  </section>
@endsection
