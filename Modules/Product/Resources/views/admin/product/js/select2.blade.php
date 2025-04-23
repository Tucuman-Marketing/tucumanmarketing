<style>
    .custom-select2-width {
    width: 100%!important;
}


/* Ajusta los Select2 que están dentro de cualquier columna de grilla de Bootstrap */
/* Ensures that Select2 takes the full width of its container within .col-md-6 */
.col-md-6 .select2-container--default .select2-selection--single,
.col-md-6 .select2-container--default .select2-selection--multiple {
    width: 100% !important;
}

/* Fixes the position of the Select2 dropdown arrow */
.col-md-6 .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: calc(2.25rem + 2px) !important; /* Adjust height as necessary */
}

/* Corrects padding for the text in the Select2 box to align with the input group */
.col-md-6 .select2-container--default .select2-selection--single .select2-selection__rendered {
    padding-left: 0.75rem; /* Bootstrap's default padding for inputs */
}

/* Customizes the appearance of the Select2 dropdown to match the width of the input */
.col-md-6 .select2-dropdown {
    width: 100% !important;
}

.modal .select2-container--default .select2-selection--single,
.modal .select2-container--default .select2-selection--multiple {
    width: 100% !important;
}

.modal .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: calc(2.25rem + 2px) !important;
}

.modal .select2-container--default .select2-selection--single .select2-selection__rendered {
    padding-left: 0.75rem !important;
    line-height: 2.25rem !important;
}

.modal .select2-dropdown {
    width: 100% !important;
}

/* CSS para que funcione el select 2 en los modales */
#create .select2-container {
    width: 100% !important;
}

#edit .select2-container {
    width: 100% !important;
}



</style>

<script>
    $(document).ready(function() {
        $('.select2').select2({

        });
    });

    function toggleSearchForm() {
        var searchForm = document.getElementById('searchForm');
        if (searchForm.style.display === 'none') {
            searchForm.style.display = 'block';
            // Reinicializa todos los select2 después de mostrar el formulario
            $('.select2').select2({
            });
        } else {
            searchForm.style.display = 'none';
        }
    }


</script>


