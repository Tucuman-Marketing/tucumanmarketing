<script>
function ModalDelete(uuid) {
    var token = $("#token").val();
    $("#permission_module").val(uuid);
    $('#delete-permissions').modal('show');
}
</script>