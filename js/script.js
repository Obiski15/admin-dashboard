const addStudentButton = document.querySelector("#add-student-btn");
const toggle = document.querySelector(".theme-toggle");

function toggleAddStudentVisibility() {
  const paths = ["/admin-dashboard/index.php", "/admin-dashboard/"];

  if (!paths.includes(document.location.pathname)) {
    addStudentButton.style.display = "none";
  }
}

function toggleThemeAndIcon() {
  const toggleLight = document.querySelector(".theme-toggle-light");
  const toggleDark = document.querySelector(".theme-toggle-dark");
  const iconLight = document.querySelector(".page-icon-light");
  const iconDark = document.querySelector(".page-icon-dark");

  function toggleIconVisibility() {
    if (document.documentElement.classList.contains("light")) {
      toggleDark.style.display = "none";
      toggleLight.style.display = "inline-block";
      iconDark.style.display = "none";
      iconLight.style.display = "inline-block";
    } else {
      iconLight.style.display = "none";
      iconDark.style.display = "inline-block";
      toggleDark.style.display = "inline-block";
      toggleLight.style.display = "none";
    }
  }
  toggleIconVisibility();

  [toggleLight, toggleDark].forEach((toggle) =>
    toggle.addEventListener("click", () => {
      document.documentElement.classList.toggle("light");
      toggleIconVisibility();
    })
  );
}

function main() {
  if (addStudentButton) {
    toggleAddStudentVisibility();
  }
  if (toggle) {
    toggleThemeAndIcon();
  }
}

main();
