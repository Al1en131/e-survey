@if ($step->stepable->getFirstMediaUrl($type))
    <div class="relative flex w-full items-center justify-center">
        <label class="flex h-60 w-full cursor-pointer flex-col items-center justify-center rounded-lg max-md:h-48"
            for="dropzone-file-{{ $key }}">
            <div class="flex flex-col items-center justify-center pb-6 pt-5">
                <img class="h-[180px] w-[180px] object-contain max-sm:h-[140px] max-sm:w-[140px]"
                    id="question-media-{{ $key }}" src="{{ $step->stepable->getFirstMediaUrl($type) }}"
                    src="${addImage}" alt="image_question" />
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span></p>
            </div>
            <input class="custom-file-input hidden" id="dropzone-file-{{ $key }}"
                name="questionsUpdate[{{ $key }}][media]" type="file" accept="image/png, image/jpeg"
                onchange="previewMedia({{ $key }})" />
        </label>
        <a image-id="{{$step->stepable->getFirstMedia($type)->id}}" class="cancel-icon-update">
            <svg class="cancel-icon group absolute right-0 top-0 h-8 w-8 hover:cursor-pointer max-md:right-1"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path class="group-hover:stroke-red-500" stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
    </div>
@endif
