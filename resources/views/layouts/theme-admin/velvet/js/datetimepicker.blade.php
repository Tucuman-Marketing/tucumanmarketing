{{--
-- se inicializa  initializeSelect2();
-- se tiene que importar @include('layouts.theme-admin.velvet.js.datetimepicker')
--}}
<script>
    function initializePublishTimePicker() {
        $('.publish-time').flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
    }

    function initializePublishDatePicker() {
        flatpickr('.publish-date', {});
    }

    function initializeDateRangePicker() {
        flatpickr('.date-range-picker', {
            mode: "range",
            dateFormat: "Y-m-d",
            onClose: function(selectedDates, dateStr, instance) {
                if (selectedDates.length === 2) {
                    var startDate = selectedDates[0].toISOString().substring(0, 10);
                    var endDate = selectedDates[1].toISOString().substring(0, 10);
                    document.getElementById('search_date_range').value = startDate + " A " + endDate;
                }
            }
        });
    }

    // Llamadas a las funciones
    initializePublishTimePicker();
    initializePublishDatePicker();
    initializeDateRangePicker();
</script>
