document.addEventListener("DOMContentLoaded", function () {
  checkStorage();
  loadAnswers();
  validateInput();
  saveButtonHandler();
});

function nextStep() {
  if (steps + 1 > totalSteps) {
    return;
  }

  const currentStep = document.getElementById(`step-${steps}`);
  const nextStep = document.getElementById(`step-${++steps}`);

  if (!nextStep) return;

  currentStep.style.display = "none";
  if (steps === totalSteps) {
    document.getElementById("next-button").style.display = "none";
    document.getElementById("finish-button").style.display = "block";
  }
  nextStep.style.display = "block";

  checkpoint(steps, nextStep);
  stepsOnChange();
  validateInput();
}

function prevStep() {
  if (steps - 1 === 0) {
    return;
  }

  const currentStep = document.getElementById(`step-${steps}`);
  const prevStep = document.getElementById(`step-${--steps}`);

  if (!prevStep) return;

  currentStep.style.display = "none";
  if (steps === totalSteps - 1) {
    document.getElementById("finish-button").style.display = "none";
    document.getElementById("next-button").style.display = "flex";
  }
  prevStep.style.display = "block";

  checkpoint(steps, prevStep);
  stepsOnChange();
  validateInput();
}

function stepsOnChange() {
  const currQuestion = document.getElementById("current-question");
  currQuestion.innerText = steps;
}

function checkpoint(steps, elements) {
  const stepQuestion = document.getElementById("steps-question");
  const stepCheckpoint = document.getElementById("steps-checkpoint");

  const isLastStep = steps === totalSteps;
  if (isLastStep) {
    document.getElementById("finish-button").disabled = false;
    document
      .getElementById("finish-button")
      .classList.remove("cursor-not-allowed");

    return;
  }

  if (elements.classList.contains("checkpoint")) {
    stepQuestion.style.display = "none";
    stepCheckpoint.style.display = "flex";

    let answers = JSON.parse(localStorage.getItem("surveyAnswers")) || {};
    answers[steps] = {
      type: "checkpoint",
      checkpointStep: steps,
    };
    localStorage.setItem("surveyAnswers", JSON.stringify(answers));
  } else {
    stepCheckpoint.style.display = "none";
    stepQuestion.style.display = "flex";
  }
}

function selectLikert(step, questionId, value) {
  let answers = JSON.parse(localStorage.getItem("surveyAnswers")) || {};
  answers[step] = {
    type: "likert",
    value,
    questionId,
  };
  localStorage.setItem("surveyAnswers", JSON.stringify(answers));
  document.getElementById(`likert-value-${step}`).value = value;
  validateInput();
  updateLikertSelection(step, value);
}

function updateLikertSelection(step, value) {
  const likertButtons = document.querySelectorAll(
    `#likert-options-${step} button`
  );
  likertButtons.forEach((button) => {
    if (parseInt(button.dataset.likert) === parseInt(value)) {
      button.classList.add("ring-4", "ring-[#ABF770]");
      button.children[0].classList.add("text-[#ABF770]", "!border-[#ABF770]");
    } else {
      button.classList.remove("ring-4", "ring-[#ABF770]");
      button.children[0].classList.remove(
        "text-[#ABF770]",
        "!border-[#ABF770]"
      );
    }
  });
}

function saveAnswer(type, step, questionId, value) {
  let answers = JSON.parse(localStorage.getItem("surveyAnswers")) || {};
  answers[step] = {
    type,
    value,
    questionId,
  };
  localStorage.setItem("surveyAnswers", JSON.stringify(answers));
  if (type === "choices") {
    document.getElementById(`choices-value-${step}`).value = value;
    updateChoiceSelection(step, value);
  }
  validateInput();
}

function updateChoiceSelection(step, value) {
  const choiceOptions = document.querySelectorAll(
    `#step-${step} .choice-option`
  );
  choiceOptions.forEach((option) => {
    if (option.id === `choice-${value}`) {
      option.classList.add("!bg-[#b86326]", "!text-white");
    } else {
      option.classList.remove("!bg-[#b86326]", "!text-white");
    }
  });
}

function validateInput() {
  const currentStepInput = document.querySelector(
    `#step-${steps} input[type="text"]`
  );
  const currentStepLikert = document.querySelector(
    `#step-${steps} input[type="hidden"]`
  );
  const currentStepChoices = document.querySelectorAll(
    `#step-${steps} .choice-option`
  );

  let isValid = false;

  if (currentStepInput && currentStepInput.value.trim() !== "") {
    isValid = true;
  } else if (currentStepLikert && currentStepLikert.value.trim() !== "") {
    isValid = true;
  } else if (currentStepChoices.length > 0) {
    currentStepChoices.forEach((choice) => {
      if (choice.classList.contains("!bg-primary")) {
        isValid = true;
      }
    });
  }

  const isLastStep = steps === totalSteps;
  if (isLastStep && isValid) {
    document.getElementById("finish-button").disabled = false;
    document
      .getElementById("finish-button")
      .classList.remove("cursor-not-allowed");
  } else {
    document.getElementById("finish-button").disabled = true;
    document
      .getElementById("finish-button")
      .classList.add("cursor-not-allowed");
  }

  const nextButton = document.getElementById("next-button");
  if (isValid && !isLastStep) {
    nextButton.disabled = false;
    nextButton.classList.remove("cursor-not-allowed");
  } else {
    nextButton.disabled = true;
    nextButton.classList.add("cursor-not-allowed");
  }

  const currentStep = document.getElementById(`step-${steps}`);
  const isCheckpoint = currentStep.classList.contains(`checkpoint`);
  if (isCheckpoint) {
    checkpoint(steps, currentStep);
  }
}

function loadAnswers() {
  let answers = JSON.parse(localStorage.getItem("surveyAnswers")) || {};

  for (let step = 1; step <= Object.keys(answers).length; step++) {
    let answer = answers[step];
    if (answer.type === "essay") {
      document.querySelector(`#step-${step} input[type="text"]`).value =
        answer.value;
    } else if (answer.type === "likert") {
      document.querySelector(`#likert-value-${step}`).value = answer.value;
      updateLikertSelection(step, answer.value);
    } else if (answer.type === "choices") {
      updateChoiceSelection(step, answer.value);
    }
  }
}

function checkStorage() {
  let storedSlug = localStorage.getItem("localSurveySlug");
  if (currentSlug != storedSlug) {
    localStorage.clear();
    localStorage.setItem("localSurveySlug", currentSlug);
  }

  const surveyAnswers = JSON.parse(localStorage.getItem("surveyAnswers"));
  if (surveyAnswers) {
    steps = Object.keys(surveyAnswers).length;

    if (steps === totalSteps) {
      document.getElementById("next-button").style.display = "none";
      document.getElementById("finish-button").style.display = "block";
    }
  }

  const stepElement = document.getElementById(`step-${steps}`);
  if (surveyAnswers && surveyAnswers[steps]["type"] === "checkpoint") {
    checkpoint(steps, stepElement);
  }
  stepElement.style.display = "block";

  stepsOnChange();
}

function saveButtonHandler() {
  const saveButton = document.getElementById("finish-button");
  saveButton.addEventListener("click", function () {
    const csrf = document.querySelector("input[name='_token']").value;
    const slug = localStorage.getItem("localSurveySlug");
    const survey = localStorage.getItem("surveyAnswers");
    if (slug && survey) {
      fetch(`/answer/${slug}/q`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrf,
        },
        body: JSON.stringify({
          surveySlug: slug,
          answerSurvey: survey,
        }),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          console.log("Success:", data);
          window.location.href = homeAnswerUrl;
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    } else {
      console.log("Data not found in localStorage");
    }
  });
}
