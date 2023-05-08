//Button actived with click
const mobilbar = document.getElementById('id_menuarea_mobil_hp');
const button = document.querySelector("#id_burger");
  button.addEventListener("click", () => {
    const currentState = button.getAttribute("data-state");

    if (!currentState || currentState === "closed") {
      button.setAttribute("data-state", "opened");
      button.setAttribute("aria-expanded", "true");
      mobilbar.classList.remove('cl_mobilNone');
    } else {
      button.setAttribute("data-state", "closed");
      button.setAttribute("aria-expanded", "false");
      mobilbar.classList.add('cl_mobilNone');
    }
  });