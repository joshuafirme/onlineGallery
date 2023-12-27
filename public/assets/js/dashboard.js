/* SIDEBAR */
const allSideMenu = document.querySelectorAll(".sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
    const li = item.parentElement;

    item.addEventListener("click", function () {
        allSideMenu.forEach((i) => {
            i.parentElement.classList.remove("active");
        });
        li.classList.add("active");
    });
});
/* SIDEBAR */

/* TOGGLE SIDEBAR */
const menuBar = document.querySelector(".content .navbar .bi.bi-list");
const sideBar = document.querySelector(".sidebar");

// Check if the sidebar state is stored in localStorage
const isSidebarHidden = localStorage.getItem("isSidebarHidden") === "true";

// Set the initial state based on localStorage
if (isSidebarHidden) {
    sideBar.classList.add("hide");
}

// Toggle sidebar state on menuBar click
menuBar.addEventListener("click", function () {
    sideBar.classList.toggle("hide");

    // Update localStorage with the current sidebar state
    localStorage.setItem("isSidebarHidden", sideBar.classList.contains("hide"));
});
/* TOGGLE SIDEBAR */

if (window.innerWidth <= 768) {
    sideBar.classList.add("hide");
}
