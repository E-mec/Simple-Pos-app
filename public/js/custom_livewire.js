window.addEventListener('close-modal', event => {
    $('.closemodal').modal('hide');
    $('.modal-backdrop').remove();

    // var modalId = event.detail.id;
    // $('#' + modalId).modal('hide');
});

//Success Message

window.addEventListener('MSGSuccessful', (event) => {
    //console.log('Event received:', event.detail); // Debugging line

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: event.detail.title
    });

});

// Delete Section

window.addEventListener('Swal:DeletedRecord', (event) => {
    const sectionId = event.detail.id;

    Swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('recordDeleted', { sectionId: sectionId })


            Livewire.on('deleted', (event)=>{
                Swal.fire({
                    title: "Deleted!",
                    text: "Record Deleted Successfully.",
                    icon: "success"
                });
            })


        }
    });
})
