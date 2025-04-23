<script>
function SeleccionarTodo() {
        if($('.checkbox').prop('checked')){
            $(".checkbox").prop("checked", false);
        }else{
             $(".checkbox").prop("checked", true);
        }
    }


//function add concept
var i = 1;
function addConcept() {


    // $(document).on('click', '#add', function () {

    var html = '';

    html= `
        <div class="row" id="row` + i + `">

            <div class="form-group col-xs-12 col-sm-12 col-md-4">
                <div class="row gutters-xs">
                    <span class="input-group-addon"><i class="fas fa-user  color-white"></i></span>
                    <div class="col">
                        <select name="concepto[]" id="period" class="form-control select2" required="">
                            <option value="">Seleccione</option>
                            <option value="expensas">Expensas del mes</option>
                            <option value="verificacion-de-obras">Verificacion de obras</option>
                            <option value="multas">Multas</option>
                            <option value="extraordinarias">Extraordinarias</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-2">
                <div class="row gutters-xs">
                    <span class="input-group-addon"><i class="fas fa-calendar  color-white"></i></span>
                    <div class="col">
                        <select name="period[]" id="period" class="form-control select2" required="">
                            <option value="">Periodos</option>
                            <option value="enero">Enero</option>
                            <option value="febrero">Febrero</option>
                            <option value="marzo">Marzo</option>
                            <option value="abril">Abril</option>
                            <option value="mayo">Mayo</option>
                            <option value="junio">Junio</option>
                            <option value="julio">Julio</option>
                            <option value="agosto">Agosto</option>
                            <option value="septiembre">Septiembre</option>
                            <option value="octubre">Octubre</option>
                            <option value="noviembre">Noviembre</option>
                            <option value="diciembre">Diciembre</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-2">
                <div class="row gutters-xs">
                    <span class="input-group-addon"><i class="fas fa-calendar  color-white"></i></span>
                    <div class="col">
                        <select name="year[]" id="period" class="form-control select2" required="">
                            <option value="">Año</option>
                            <option value="{{ date('Y')-1 }}">{{ date('Y')-1 }}</option>
                            <option value="{{ date('Y') }}" selected>{{ date('Y') }}</option>
                            <option value="{{ date('Y')+1 }}">{{ date('Y')+1 }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3">
                <div class="input-group input-icon right">
                    <span class="input-group-addon"><i class="fas fa-dollar-sign color-white"></i></span>
                    <input type="number" name="total[]" id="amount" class="form-control" required="">
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-1">
                <button type="button" name="remove"  class="btn btn-danger btn-sm remove"  id="` + i + `"><i class="fas fa-trash-alt"></i></button>
            </div>

        </div>

            `;



    $('#render').append(html);

    //eliminar conceptos de la fila
    $(document).on('click', '.remove', function () {
            var button_id = $(this).attr("id");
            console.log(button_id);
            $('#row' + button_id + '').remove();
        });

        i++;
// });

}



function deleteConcept(uuid) {



      //ajax
      $.ajax({

        type: "POST",
        dataType : 'json',
        data: {
          _token: "{{ csrf_token() }}",
          uuid: uuid,
        },

        success: function (response) {
          if (response.success == true) {

              //actualizar la variable $receipt
              $receipt = response.receipt;
              //recargar id=contenedor
              toastr["success"]("Concepto Elimininado!");
              $('#contenedor').load(document.URL +  ' #contenedor');

          } else {
            alert(response.message);
          }
        },
        error: function (response) {
          alert('Error al eliminar el concepto');
        }
      });

    }


</script>
