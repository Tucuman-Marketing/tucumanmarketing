{{--
-- se inicializa  initializeSelect2();
-- se tiene que importar @include('layouts.theme-admin.velvet.js.select2')
--}}

<style>
    .custom-select-2-width {
        width: 100% !important;
    }

    /* Ajusta los Select-2 que están dentro de cualquier columna de grilla de Bootstrap */
    /* Ensures that Select-2 takes the full width of its container within .col-md-6 */
    .col-md-6 .select-2-container--default .select-2-selection--single,
    .col-md-6 .select-2-container--default .select-2-selection--multiple {
        width: 100% !important;
    }

    /* Fixes the position of the Select-2 dropdown arrow */
    .col-md-6 .select-2-container--default .select-2-selection--single .select-2-selection__arrow {
        height: calc(2.25rem + 2px) !important;
        /* Adjust height as necessary */
    }

    /* Corrects padding for the text in the Select-2 box to align with the input group */
    .col-md-6 .select-2-container--default .select-2-selection--single .select-2-selection__rendered {
        padding-left: 0.75rem;
        /* Bootstrap's default padding for inputs */
    }

    /* Customizes the appearance of the Select-2 dropdown to match the width of the input */
    .col-md-6 .select-2-dropdown {
        width: 100% !important;
    }

    .modal .select-2-container--default .select-2-selection--single,
    .modal .select-2-container--default .select-2-selection--multiple {
        width: 100% !important;
    }

    .modal .select-2-container--default .select-2-selection--single .select-2-selection__arrow {
        height: calc(2.25rem + 2px) !important;
    }

    .modal .select-2-container--default .select-2-selection--single .select-2-selection__rendered {
        padding-left: 0.75rem !important;
        line-height: 2.25rem !important;
    }

    .modal .select-2-dropdown {
        width: 100% !important;
    }

    /* CSS para que funcione el select 2 en los modales */
    #create .select-2-container {
        width: 100% !important;
    }

    #edit .select-2-container {
        width: 100% !important;
    }
</style>


<script>
    function initializeSelect2() {
        // Inicialización inicial de Select2
        $('.select-2').select2({
            width: '100%' // Asegura que el select2 use el 100% del ancho del contenedor
        });

        // Inicialización de Select2 cuando se abre un modal
        $('.modal').on('shown.bs.modal', function() {
            $(this).find('.select-2').select2({
                width: '100%', // Asegura que el select2 use el 100% del ancho del contenedor
                dropdownParent: $(
                    this) // Asegura que el dropdown de Select2 se renderice dentro del modal
            });
        });
    }

    // Llamadas a las funciones
    initializeSelect2();
</script>
