@if(session ("mensaje"))
    <div class="alert alert-block alert-success alert-dismissible" data-auto-dismiss="3000">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <i class="ace-icon fa fa-check green"></i>
        {{session("mensaje")}}
    </div>
@endif
