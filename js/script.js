const addStudentButton = document.querySelector("#add-student-btn");

// set theme from local storage
(() => {
  const theme = localStorage.getItem("theme");

  if (theme) {
    document.documentElement.classList.add(theme);
  }
})();

function toggleAddStudentVisibility() {
  const paths = ["/admin-dashboard/index.php", "/admin-dashboard/"];

  if (!paths.includes(document.location.pathname)) {
    addStudentButton.style.display = "none";
  }
}

function toggleThemeAndIcon() {
  const toggleLight = document.querySelector(".theme-toggle-light");
  const toggleDark = document.querySelector(".theme-toggle-dark");
  const lightIcons = document.querySelectorAll(".icon-light");
  const darkIcons = document.querySelectorAll(".icon-dark");

  function toggleIconVisibility() {
    if (document.documentElement.classList.contains("light")) {
      lightIcons.forEach((e) => (e.style.display = "inline-block"));
      darkIcons.forEach((e) => (e.style.display = "none"));
    } else {
      lightIcons.forEach((e) => (e.style.display = "none"));
      darkIcons.forEach((e) => (e.style.display = "inline-block"));
    }
  }
  toggleIconVisibility();

  [
    { component: toggleLight, theme: "" },
    { component: toggleDark, theme: "light" },
  ].forEach((toggle) =>
    toggle.component.addEventListener("click", () => {
      document.documentElement.classList.toggle("light");
      localStorage.setItem("theme", toggle.theme);
      toggleIconVisibility();
    })
  );
}

function main() {
  toggleAddStudentVisibility();
  toggleThemeAndIcon();
}

main();
