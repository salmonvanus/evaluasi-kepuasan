const currentLocation = location.href;
const menuItem = document.querySelector('a');
const menuLength = menuItem.length
for (let i = 0; i < menuLength; i++) {
    if (menuItem[i].href === currentLocation) {
        menuItem[i].className = "uk-active"
    }
}