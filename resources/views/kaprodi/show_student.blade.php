@extends('layout.app')

@section('content')

<x-navbar></x-navbar>

  <x-sidebar></x-sidebar>
<section class="bg-white dark:bg-gray-900">

    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detail Siswa</h2>
            <div class="flex flex-col gap-0 sm:grid-cols-2 sm:gap-0">

                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa</label>
                    <h3 class="mb-4 text-md font-bold text-gray-900 dark:text-white">{{ $student->name }}</h3>
                </div>
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal Sekolah</label>
                    <h3 class="mb-4 text-md font-bold text-gray-900 dark:text-white">{{ $student->school_address }}</h3>
                </div>
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan Sekolah</label>
                    <h3 class="mb-4 text-md font-bold text-gray-900 dark:text-white">{{ $student->majors->name }}</h3>
                </div>
                <div class="sm:col-span-2">
                <div class="relative overflow-x-auto mb-4 ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-s-lg">
                                    Nama Kriteria
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nilai
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student->subjectStudent as $item)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ "C" . $loop->iteration}}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->pivot->value }}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rekomendasi Program Studi</label>
                <div class="flex items-center gap-5">
                    <p type="button" class="{{($student->recomendation_result != 'MJ') ? 'Teknik Informatika' : 'bg-blue-700  text-white'}} font-medium rounded-full text-sm px-5 py-2.5 text-center  ">Manajemen</p>
                    <p type="button" class="{{ ($student->recomendation_result != 'TI') ? 'Teknik Informatika' : 'bg-blue-700  text-white'}} font-medium rounded-full text-sm px-5 py-2.5 text-center  ">Teknik Informatika</p>
                </div>
            </div>
        </div>
        </form>
    </div>
  </section>
@endsection
