
document.addEventListener("DOMContentLoaded", function () {
    //SideBarFunction
    let sidebarOpen = false;
    const iconMenuWrapper = document.getElementById('icon-menu');
    const iconMenu = document.getElementById('icon-burguer');
    const sidebar = document.getElementById('sideBar');

    if (iconMenuWrapper && iconMenu && sidebar) {
        iconMenuWrapper.addEventListener('click', function () {
            if (sidebarOpen) {
                iconMenu.innerText = "menu";
                sidebar.style.transform = 'translateX(0%)';
            } else {
                iconMenu.innerText = "close";
                sidebar.style.transform = 'translateX(100%)';
            }

            sidebarOpen = !sidebarOpen;
        });
    }
    /************************************************************/
    //Dropdown Function Translate
    const trigger = document.getElementById('trigger');
    const dropdown = document.getElementById('dropdown');
    const iconDrop = document.getElementById('iconDrop');

    trigger.addEventListener('click', () => {
        if (dropdown.style.maxHeight === "30px") {
            iconDrop.innerText = "arrow_drop_up";
            dropdown.style.maxHeight = dropdown.scrollHeight + "px"; // Altura final
        } else {
            iconDrop.innerText = "arrow_drop_down";
            dropdown.style.maxHeight = "30px";
        }
    });
    /*************************************************************/

    document.getElementById('back-page').addEventListener('click', function(){
        window.history.back();
    });
});

document.getElementById('image_1').addEventListener('change', function(event) {
    const file = event.target.files[0];

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const img = document.getElementById('preview_image_1');
            img.src = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        alert('Por favor, selecione uma imagem válida.');
    }
});
document.getElementById('image_2').addEventListener('change', function(event) {
    const file = event.target.files[0];

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const img = document.getElementById('preview_image_2');
            img.src = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        alert('Por favor, selecione uma imagem válida.');
    }
});
