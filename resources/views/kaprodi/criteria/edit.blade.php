@extends('layout.app')

@section('content')

<x-navbar></x-navbar>

  <x-sidebar></x-sidebar>
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"></h2>
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ubah Nilai Kriteria</h2>
        <form action={{ route('kaprodi.criteria.update',['id' => $criteria->id]) }} method="POST">
            @method('PUT')
            @csrf
            <div class="flex flex-col gap-0 sm:grid-cols-2 sm:gap-0">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kriteria</label>
                    <h3 class="mb-4 text-md font-bold text-gray-900 dark:text-white">{{ $criteria->name }}</h3>
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Kriteria</label>
                    <input type="text" name="weight" id="brand" value="{{ $criteria->weight }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0.3" required="">
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                Ubah Nilai
            </button>
        </form>
    </div>
  </section>
@endsection
