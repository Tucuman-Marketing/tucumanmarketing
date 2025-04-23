<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>


<script>
    $(document).ready(function(){
        $("#amount").inputmask('currency', {
            prefix: '$',
            groupSeparator: ',',
            autoGroup: true,
            digits: 2,
            digitsOptional: false,
            placeholder: '0'
        });

        $("#amount_usd").inputmask('currency', {
            prefix: 'USD',
            groupSeparator: ',',
            autoGroup: true,
            digits: 2,
            digitsOptional: false,
            placeholder: '0'
        });

    });


</script>


