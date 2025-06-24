<x-admin-layout>
    <div class="">
        <div class="">
            <div class="flex items-center justify-between pb-[31px] max-md:pb-4">
                <div class="">
                    <h1 class="pb-2 text-4xl font-medium text-secondery max-md:pb-0 max-md:text-lg">
                        Setting
                    </h1>
                </div>
                <div class="flex items-center justify-end">
                    <div class="rounded-lg bg-primary p-2">
                        <a class="" href="{{ route('admin.survey.index') }}">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mb-8 pr-8 bg-primary flex items-center gap-6 rounded-lg">
                <div class="flex items-center space-x-3">
                    <img src="/assets/image/people-3.png" alt="People Icon" class="w-64 h-64 object-cover rounded-full" />
                </div>
                <div class="text-white">
                    <h2 class="text-xl font-semibold mb-2">Company Profile Settings</h2>
                    <p class="text-sm leading-relaxed max-w-2xl">
                        This page allows you to update your company's profile information, including the logo, company
                        name, and a short description. Keep your profile up to date to maintain a professional
                        appearance across the platform.
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.management.update', ['management' => $management->id]) }}"
                enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf
                @method('put')
                @if (session('success'))
                    <div align="center" class="success-alert">
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                function showSuccessAlert() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: '{{ session('success') }}',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "{{ route('admin.index') }}";
                                        }
                                    });
                                }
                                showSuccessAlert();
                            });
                        </script>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-5 text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-10 grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="block sm:col-span-2 sm:flex">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-primary border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-container">
                                @if ($management->getFirstMediaUrl('management'))
                                    <div class="mb-4 flex justify-center md:justify-center">
                                        <img class="h-40 w-auto object-cover" id="media"
                                            src="{{ $management->getFirstMediaUrl('management') }}" alt="Uploaded Logo">
                                    </div>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to update logo</p>
                                @else
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload logo</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG (MAX. 1 Mb)
                                    </p>
                                @endif
                            </div>
                            <input
                                class="w-full mb-1 text-sm hidden text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                type="file" name="media" accept="image/png, image/jpeg" id="dropzone-file">
                        </label>
                    </div>
                    <div class="block sm:col-span-2 sm:flex">
                        <label class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                            for="survey">Title</label>
                        <input
                            class="focus:ring-primary-600 mb-1 focus:border-primary-600 focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400"
                            id="title" name="title" type="text"
                            value="{{ $management->title != null ? $management->title : 'Title is empty' }}""
                            placeholder="Type survey name" required="">
                    </div>
                    <div class="block sm:col-span-2 sm:flex">
                        <label class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                            for="survey-description">Description</label>
                        <textarea
                            class="focus:ring-primary-500 focus:border-primary-500 focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400"
                            id="description" name="description" rows="4" placeholder="Your description here" required>{{ old('description', $management->description ?? 'empty description') }}</textarea>
                    </div>
                </div>
                <button class="w-full rounded-lg bg-primary px-6 py-[11px] font-medium text-white hover:bg-secondary"
                    type="submit">
                    Save
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
<script>
    document.getElementById('dropzone-file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let media = document.getElementById('media');
                if (!media) {
                    media = document.createElement('img');
                    media.id = 'media';
                    media.className = 'h-40 w-auto object-cover';
                    const container = document.getElementById('upload-container');
                    container.innerHTML = '';
                    container.appendChild(media);
                }
                media.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('admin.index') }}";
                }
            });
        @endif
    });
</script>
