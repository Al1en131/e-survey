function previewMedia(id) {
    const questionMedia = document.getElementById(`question-media-${id}`);
    const [dropzoneFIle] = document.getElementById(`dropzone-file-${id}`).files;

    if (dropzoneFIle) {
        questionMedia.src = URL.createObjectURL(dropzoneFIle);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("click", function (e) {
        if (e.target && e.target.id === "add-image") {
            const questionItem = e.target.closest(".question-item");
            const questionContent =
                questionItem.querySelector(".question-content");

            let imageDiv = questionContent.querySelector(".image");
            let inputFile = imageDiv.querySelector(".custom-file-input");
            const step = getQuestionContainerId(questionItem);

            const containerInput =
                questionItem.getElementsByTagName("input")[0];
            const nameInput = containerInput.name.includes("questionsUpdate")
                ? "questionsUpdate"
                : "questions";

            if (!inputFile) {
                imageDiv.innerHTML = `
          <div class="image-container flex items-center justify-center w-full relative">
              <label for="dropzone-file-${step}" class="flex flex-col items-center justify-center w-full h-60 max-md:h-48 rounded-lg cursor-pointer">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                      <img id="question-media-${step}" class="w-[180px] h-[180px] max-sm:h-[140px] max-sm:w-[140px] object-contain" src="${addImage}" alt="image_question" />
                      <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                  </div>
                  <input class="hidden custom-file-input" id="dropzone-file-${step}" name="${nameInput}[${step}][media]" type="file" accept="image/png, image/jpeg" onchange="previewMedia(${step})" />
              </label>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 right-0 max-md:right-1 top-0 absolute hover:cursor-pointer group cancel-icon">
                  <path class="group-hover:stroke-red-500" stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
          </div>`;

                inputFile = imageDiv.querySelector(`#dropzone-file-${step}`);
                inputFile.click();
            }
        }

        if (e.target && e.target.classList.contains("cancel-icon")) {
            const imageContainer = e.target.closest(".image-container");
            if (imageContainer) {
                Swal.fire({
                    title: "Are you sure you want to delete this photo?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#275279",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        imageContainer.remove();
                    }
                });
            }
        }

        if (e.target && e.target.id === "add-option-btn") {
            const container = e.target.closest("#answers-container");
            const optionCount = container.getElementsByClassName("flex").length;
            const newOptionLabel = String.fromCharCode(65 + optionCount);

            const newOptionDiv = document.createElement("div");
            newOptionDiv.className = "flex sm:col-span-2 mb-4 option-container";

            const questionItem = e.target.closest(".question-item");
            const step = getQuestionContainerId(questionItem);

            const containerInput = container.getElementsByTagName("input")[0];
            const nameInput = containerInput.name.includes("questionsUpdate")
                ? "questionsUpdate"
                : "questions";

            newOptionDiv.innerHTML = `
        <div class="items-center text-center justify-center content-center delete-option">                                    
            <svg class="mr-2 h-7 w-7 max-md:h-5 max-md:w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke="#C40C0C" stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </div>
        <div class="text-center justify-center content-center items-center mr-4">
            <label for="name" class="block text-sm text-white py-[6px] text-center w-8 h-8 rounded-full bg-green-500">${newOptionLabel}</label>
        </div>
        <input type="text" name="${nameInput}[${step}][options][]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2 placeholder-gray-400" placeholder="" required>
      `;

            container.insertBefore(newOptionDiv, container.lastElementChild);
            optionOnChange(container);
        }

        if (e.target && e.target.closest(".delete-option")) {
            const optionContainer = e.target.closest(".option-container");
            if (optionContainer && optionContainer.id != "option-container") {
                optionContainer.remove();
            }
        }
    });

    function optionOnChange(container) {
        const optionContainers =
            container.querySelectorAll(".option-container");
        optionContainers.forEach((option, i) => {
            const optionLabel = option.childNodes[3].querySelector("label");
            optionLabel.innerText = String.fromCharCode(65 + i);
        });
    }

    function deleteImageupdate() {
        const deleteImagesUpdate = document.querySelectorAll(
            ".cancel-icon-update",
        );

        deleteImagesUpdate.forEach((button) => {
            button.addEventListener("click", function (e) {
                e.preventDefault();

                const mediaId = this.getAttribute("image-id");
                const deleteUrl = `/admin/media/${mediaId}/destroy`;

                Swal.fire({
                    title: "Are you sure about deleting this question?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#275279",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl;
                    }
                });
            });
        });
    }
    deleteImageupdate();

    function deleteQuestion(event) {
        if (event.target.closest(".delete-question")) {
            const questionItem = event.target.closest(".question-item");
            if (questionItem.id != "question-template") {
                Swal.fire({
                    title: "Are you sure about deleting this question?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#275279",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        questionItem.remove();
                        updateQuestionNumbers();
                    }
                });
            }
        }
    }

    function deleteQuestionupdate() {
        const deleteButtonsUpdate = document.querySelectorAll(
            ".delete-question-update",
        );

        deleteButtonsUpdate.forEach((button) => {
            button.addEventListener("click", function (e) {
                e.preventDefault();

                const stepId = this.getAttribute("cancel-id");

                Swal.fire({
                    title: "Are you sure about deleting this question?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#275279",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        const questionItem =
                            this.closest(".question-item");
                        if (questionItem.id != "question-template") {
                            questionItem.remove();
                            updateQuestionNumbers();
                        } else {
                            const deleteUrl = `/admin/step/${stepId}/destroy`;
                            window.location.href = deleteUrl;
                        }
                    }
                });
            });
        });
    }

    function updateQuestionNumbers() {
        const questions = document.querySelectorAll(".question-item");
        questions.forEach((question, index) => {
            question.querySelector(".question-number").textContent =
                "Question " + (index + 1);
        });
    }

    function getQuestionContainerId(target) {
        if (target.querySelector('input').name.includes("questionsUpdate[0]")) {
            return 0;
        }

        return target.id === "question-template" ? 1 : target.id;
    }

    document.addEventListener("click", deleteQuestion);

    document
        .getElementById("add-question-btn")
        .addEventListener("click", function () {
            currentStep++;

            const container = document.getElementById("questions-container");
            const newQuestion = document
                .getElementById("question-template")
                .cloneNode(true);

            newQuestion.querySelector(".question-number").textContent =
                "Question " + currentStep;
            newQuestion.setAttribute("id", currentStep);

            const step = getQuestionContainerId(newQuestion);

            const isInputUpdate = newQuestion.querySelector("input[hidden]");
            if (isInputUpdate) {
                isInputUpdate.name = `questions[${step}][type]`;
            }

            const dropdownType = newQuestion.querySelector(".type-dropdown");
            dropdownType.name = `questions[${step}][type]`;
            dropdownType.options.selectedIndex = 0;

            const imageDiv = newQuestion.querySelector(".image");
            imageDiv.innerHTML = "";

            const questionContent =
                newQuestion.querySelector(".question-content");
            questionContent.innerHTML = `
        <div class=" p-4 border border-gray-300 rounded-b-lg">
            <div class="image"></div>
            <div class="rounded-lg border-gray-400 border p-4">
                <div class="relative z-0 w-full group">
                    <input type="text" name="questions[${step}][question]"
                        class="block py-2.5 px-0 w-full bg-transparent text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary peer"
                        placeholder=" " required />
                </div>
            </div>
        </div>
      `;

            container.appendChild(newQuestion);
            updateQuestionNumbers();
            deleteQuestionupdate();
        });
    deleteQuestionupdate();

    document.addEventListener("change", function (e) {
        if (e.target.classList.contains("type-dropdown")) {
            const questionItem = e.target.closest(".question-item");
            const questionContent =
                questionItem.querySelector(".question-content");

            const nameInput = e.target.name.includes("questionsUpdate")
                ? "questionsUpdate"
                : "questions";

            const selectedType = e.target.value;
            const step = getQuestionContainerId(questionItem);

            switch (selectedType) {
                case "checkpoint":
                    questionContent.innerHTML = `
            <div class="rounded-b-lg border border-gray-300 p-4">
                <div class="image"></div>
                <div class="p-4">
                    <div class="mb-4 block sm:col-span-2 sm:flex">
                        <label
                            class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                            for="checkpoint">Title</label>
                        <input
                            class="focus:ring-primary-600 focus:border-primary-600 focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400"
                            id="checkpoint" name="${nameInput}[${step}][checkpoint]"
                            type="text" placeholder="Title checkpoint"
                            required="">
                    </div>
                    <div class="block sm:col-span-2 sm:flex">
                        <label
                            class="mb-1 block w-32 py-2.5 text-sm font-medium text-gray-900"
                            for="description">Description</label>
                        <textarea
                            class="focus:ring-primary-500 focus:border-primary-500 focus:ring-primary-500 focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-400"
                            id="description" name="${nameInput}[${step}][checkpointDescription]" rows="4"
                            placeholder="Your description here" required></textarea>
                    </div>
                </div>
            </div>
          `;
                    break;

                case "essay":
                    questionContent.innerHTML = `
            <div class="rounded-b-lg border border-gray-300 p-4">
                <div class="image"></div>
                <div class="rounded-lg border border-gray-400 p-4">
                    <div class="group relative z-0 w-full">
                        <input
                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-0"
                            name="${nameInput}[${step}][question]"
                            type="text" placeholder=" " required />
                    </div>
                </div>
            </div>
          `;
                    break;

                case "likert":
                    questionContent.innerHTML = `
            <div class="border border-gray-300 p-4">
                <div class="image"></div>
                <div class="rounded-lg border border-gray-400 p-4">
                    <div class="group relative z-0 w-full">
                        <input
                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-0"
                            name="${nameInput}[${step}][question]" type="text"
                            placeholder=" " required />
                    </div>
                </div>
            </div>
            <div class="rounded-b-lg border border-gray-300 p-4">
                <div class="flex content-center justify-center text-center">
                    <div class="flex">
                        <p
                            class="content-center justify-center text-center text-sm text-primary">
                            From<span
                                class="mx-6 font-semibold text-secondary">1</span>
                        </p>
                    </div>
                    <div class="ms-4 flex gap-6">
                        <p
                            class="content-center justify-center text-center text-sm text-primary">
                            To</p>
                        <select
                            class="block w-[64px] rounded-lg border border-gray-300 bg-white p-[10px] text-sm font-semibold text-secondary focus:border-secondary focus:ring-secondary"
                            id="type" name="${nameInput}[${step}][likert]">
                            <option class="hover:bg-black" value="1"
                                selected>1</option>
                            <option class="hover:bg-black" value="2">2
                            </option>
                            <option class="hover:bg-black" value="3">3
                            </option>
                            <option class="hover:bg-black" value="4">4
                            </option>
                            <option class="hover:bg-black" value="5">5
                            </option>
                            <option class="hover:bg-black" value="6">6
                            </option>
                            <option class="hover:bg-black" value="7">7
                            </option>
                            <option class="hover:bg-black" value="8">8
                            </option>
                            <option class="hover:bg-black" value="9">9
                            </option>
                            <option class="hover:bg-black" value="10">10
                            </option>
                            <option class="hover:bg-black" value="11">11
                            </option>
                            <option class="hover:bg-black" value="12">12
                            </option>
                            <option class="hover:bg-black" value="13">13
                            </option>
                            <option class="hover:bg-black" value="14">14
                            </option>
                            <option class="hover:bg-black" value="15">15
                            </option>
                        </select>
                    </div>
                </div>
            </div>
          `;
                    break;

                case "choices":
                    questionContent.innerHTML = `
            <div class="border border-gray-300 p-4">
                <div class="image"></div>
                <div class="rounded-lg border border-gray-400 p-4">
                    <div class="group relative z-0 w-full">
                        <input
                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-primary focus:outline-none focus:ring-0"
                            name="${nameInput}[${step}][question]" type="text"
                            placeholder=" " required />
                    </div>
                </div>
            </div>
            <div class="rounded-b-lg border border-gray-300 p-4"
                id="answers-container">
                <div class="option-container mb-4 flex sm:col-span-2"
                    id="option-container">
                    <div
                        class="delete-option content-center items-center justify-center text-center">
                        <svg class="mr-2 h-7 w-7 max-md:h-5 max-md:w-5"
                            xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke="#C40C0C"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg></div>
                    <div
                        class="mr-4 content-center items-center justify-center text-center">
                        <label
                            class="block rounded-full bg-green-500 py-[6px] text-center w-8 h-8 text-sm text-white"
                            for="name">A</label>
                    </div>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 placeholder-gray-400 focus:border-secondary focus:ring-secondary"
                        id="answer" name="${nameInput}[${step}][options][]"
                        type="text" placeholder="" required />
                </div>
                <div>
                    <button class="text-sm" id="add-option-btn" type="button">+
                        Add answer option</button>
                </div>
            </div>
          `;
                    break;
            }
        }
    });
});
