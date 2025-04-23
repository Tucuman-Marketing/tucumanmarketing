<script>
    function PasswordGenerate(){
        $.get('user-password-generate/', function(data){
        $("#password").val(data);
        $("#re-password").val(data);
        $("#label-password").val(data);

        });
    }
</script>