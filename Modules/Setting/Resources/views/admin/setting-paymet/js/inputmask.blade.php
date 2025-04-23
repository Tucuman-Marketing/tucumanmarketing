public\

    {!!Html::script('theme-admin\volgh\assets\plugins\input-mask\jquery.mask.min.js')!!}
    {!!Html::script('theme-admin\volgh\assets\plugins\input-mask\jquery.maskedinput.js')!!}

<script>
$(":input").inputmask();
$("#numerotarjeta").inputmask({"mask": "9999 9999 9999 9999"});
$("#dni").inputmask({"mask": "99999999"});
$("#cuit").inputmask({"mask": "99-99999999-9"});
$(".telefono").inputmask({"mask": "(999) 999-9999"});
  $('.email').inputmask({
    mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
    greedy: false,
    onBeforePaste: function (pastedValue, opts) {
      pastedValue = pastedValue.toLowerCase();
      return pastedValue.replace("mailto:", "");
    },
    definitions: {
      '*': {
        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
        casing: "lower"
      }
    }
  });
</script>