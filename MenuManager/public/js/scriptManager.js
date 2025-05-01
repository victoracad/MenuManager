document.addEventListener("DOMContentLoaded", function () {
    //
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