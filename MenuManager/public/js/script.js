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
