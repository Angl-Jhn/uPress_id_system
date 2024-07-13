document.addEventListener("DOMContentLoaded", () => {
  const initializeStepper = (stepperSelector) => {
    const stepper = document.querySelector(stepperSelector);
    if (!stepper) return;

    const nextButton = stepper.querySelector(".btn-next");
    const prevButton = stepper.querySelector(".btn-prev");
    const steps = stepper.querySelectorAll(".step");
    const form_steps = stepper.querySelectorAll(".form-step");
    const submitButton = stepper.querySelector(".btn-submit");
    let active = 1;

    const scrollToTop = (topPosition) => {
      window.scrollTo({
        top: topPosition,
        behavior: "smooth",
      });
    };

    const getScrollPosition = () => {
      const width = window.innerWidth;
      if (width >= 993) {
        return 13; // Desktop view
      } else if (width >= 768 && width < 993) {
        return 180; // Tablet view
      } else {
        return 160; // Mobile view
      }
    };

    if (nextButton) {
      nextButton.addEventListener("click", () => {
        active++;
        if (active > steps.length) {
          active = steps.length;
        }
        updateProgress();
        scrollToTop(getScrollPosition());
      });
    }

    if (prevButton) {
      prevButton.addEventListener("click", () => {
        active--;
        if (active < 1) {
          active = 1;
        }
        updateProgress();
        scrollToTop(getScrollPosition());
      });
    }

    // const pillButton = stepper.querySelector(".nav-link");
    // if (pillButton) {
    //   pillButton.addEventListener("click", () => {
    //     updateProgress();
    //   });
    // }

    const updateProgress = () => {
      steps.forEach((step, i) => {
        if (i == active - 1) {
          step.classList.add("active");
          form_steps[i].classList.add("active");
          $(".btn-next").show();
          $(".btn-submit").hide();
        } else {
          step.classList.remove("active");
          form_steps[i].classList.remove("active");
          $(".btn-submit").hide();
        }
      });

      if (active === 1) {
        $(".btn-prev").hide();
        prevButton.disabled = true;
        $(".btn-submit").hide();
        submitButton.disabled = true;
      } else if (active === steps.length) {
        $(".btn-prev").show();
        $(".btn-next").hide();
        $(".btn-submit").show();
        nextButton.disabled = true;
        submitButton.disabled = false;
      } else {
        $(".btn-prev").show();
        prevButton.disabled = false;
        nextButton.disabled = false;
        submitButton.disabled = true;
      }
    };

    updateProgress();
  };

  // Initialize steppers for both student and employee tabs
  initializeStepper("#pills-student");
  initializeStepper("#pills-employee");
});
