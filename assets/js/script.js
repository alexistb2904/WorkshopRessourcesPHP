function toggleMenu() {
    const menuItems = document.querySelector(".menu-items");
    menuItems.classList.toggle("show-menu");
}

const dropdown = document.getElementsByClassName("btn-dropdown-ws");

for (let i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "flex") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "flex";
        }
    });
}