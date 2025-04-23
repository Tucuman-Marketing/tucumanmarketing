# emjemplo de create ckeditor hmtl
 <div class="form-group">
    <textarea class="form-control ckeditor_create" name="content" id="content" ></textarea>
</div>

<div class="form-group">
    <textarea class="form-control ckeditor_create " name="content2" id="content2"></textarea>
</div>


# emjemplo de Edit ckeditor hmtl , los textarea hidden son para que se muestre el contenido en el ckeditor
# y tienen que tener este formato si es que hay mas de un ckeditor id="ckeditor_edit1" , id="ckeditor_edit2" , etc

<textarea hidden id="ckeditor_edit1">{!! $data->content !!}</textarea>
<div class="form-group">
    <textarea class="form-control ckeditor_edit" name="content" id="content"></textarea>
</div>

<textarea hidden id="ckeditor_edit2">{!! $data->content2 !!}</textarea>
<div class="form-group">
    <textarea class="form-control ckeditor_edit" name="content2" id="content2"></textarea>
</div>

