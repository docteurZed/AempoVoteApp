@extends('partials.member.base')

@section('content')
    <section class="container mx-auto max-w-3xl px-6 py-12">
        @if (Session::has('success'))
            <div class="flex items-center p-4 mb-4 rounded-lg bg-gray-800/40 text-green-600" role="alert">
                <svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                </svg>
                <div class="ms-3 text-sm font-medium">{{ Session::get('success') }}</div>
            </div>
        @elseif($errors->any())
            @foreach ($errors->all() as $error)
                <div class="flex items-center p-4 mb-4 rounded-lg bg-red-50 bg-gray-800/40 text-red-600" role="alert">
                    <svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">{{ $error }}</div>
                </div>
            @endforeach
        @endif

        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-white">
                Soumettez le document excel
            </h2>
            <div class="mt-3">
                <span class="w-32 h-1 bg-green-600 rounded-full inline-block"></span>
            </div>
        </div>

        <form action="{{ route('admin.import.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="file" class="block mb-3 text-green-600 font-semibold">Document</label>
                <div class="flex items-center justify-center w-full">
                    <label id="file-label"
                        class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-600 rounded-lg cursor-pointer bg-gray-700/40 hover:bg-gray-700 transition-all">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5A5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p id="file-text" class="mb-1 text-sm text-gray-400">
                                <span class="font-semibold text-red-500">Cliquez pour téléverser</span> ou glissez-déposez
                            </p>
                            <p class="text-xs text-gray-500">XLSX, XLS, CSV</p>
                        </div>
                        <input id="file" name="file" type="file" class="hidden" accept=".xlsx,.xls,.csv" />
                    </label>
                </div>
            </div>


            <div class="mt-6">
                <button type="submit"
                    class="px-8 py-3 bg-green-700 text-white font-semibold text-lg rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 transition">
                    Soumettre
                </button>
            </div>
        </form>
    </section>

    <script>
        const fileInput = document.getElementById('file');
        const fileText = document.getElementById('file-text');

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                fileText.innerHTML = `<span class="font-semibold text-red-500">${fileInput.files[0].name}</span>`;
            } else {
                fileText.innerHTML =
                    `<span class="font-semibold text-red-500">Cliquez pour téléverser</span> ou glissez-déposez`;
            }
        });
    </script>
@endsection
