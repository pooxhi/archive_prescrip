import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.start();

/*
|--------------------------------------------------------------------------
| Global SweetAlert2 confirmation handler
|--------------------------------------------------------------------------
| Any form with [data-swal-confirm] will automatically use a
| SweetAlert2 confirmation dialog before submitting.
*/

document.addEventListener('submit', async (event) => {
    const form = event.target.closest('form[data-swal-confirm]');

    if (!form) {
        return;
    }

    // Allow the form to submit normally after confirmation.
    if (form.dataset.swalConfirmed === 'true') {
        return;
    }

    event.preventDefault();

    const result = await Swal.fire({
        title: form.dataset.swalTitle || 'Are you sure?',
        text: form.dataset.swalText || 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: form.dataset.swalConfirmText || 'Confirm',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        focusCancel: true,
        confirmButtonColor: '#1F6F5F',
    });

    if (result.isConfirmed) {
        form.dataset.swalConfirmed = 'true';
        form.submit();
    }
});