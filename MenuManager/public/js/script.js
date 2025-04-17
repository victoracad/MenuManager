document.addEventListener("click", function (event) { 
    if (event.target && event.target.id === "status") {
        alert('en');
        
    }
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".change-status").forEach(checkbox => {
        checkbox.addEventListener("click", function () {
            let dish_id = this.dataset.id;
            $.ajax({
                url: `/admin/changeDishStatus/${dish_id}`,  
                type: "GET",  
                success: function(data) {
                    $(`#dishSpanCheckbox-${dish_id}`).html(data.status);
                },
                error(){
                    alert('Algo deu errado');
                }
            });
        });
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

function backPage() {
    window.history.back();
}

function updateSlide() {
    carousel.style.transform = `translateX(-${index * 100}%)`;
}
function nextSlide() {
    index = (index + 1) % totalSlides;
    updateSlide(index);
}
function prevSlide() {
    index = (index - 1 + totalSlides) % totalSlides;
    updateSlide();
}
function test(){
    const sideBar = document.getElementById('sideBar');
    sideBar.style.transform = `translateX(0%)`;
}



function toggleSidebar() {
  const sidebar = document.getElementById('sideBar');
  const iconMenu = document.getElementById('iconMenu');

  if (sidebarOpen) {
    iconMenu.innerText = "menu";
    sidebar.style.transform = 'translateX(0%)';
  } else {
    iconMenu.innerText = "close";
    sidebar.style.transform = 'translateX(100%)';
  }

  sidebarOpen = !sidebarOpen;
}



//SISTEMA DO MODEL DE CONFIRMAÇÃO 