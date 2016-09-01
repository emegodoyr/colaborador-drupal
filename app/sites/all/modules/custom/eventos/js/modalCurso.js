(function($) {
    $ = jQuery;
    var cursoModal = function(){
        var modal = $(".cursoModal").append('<div class="modal fade"  id="modalCursoPlayer" style="overflow-y:hidden"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog-expanded" ><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">X</button><h4 class="modal-title">&nbsp;</h4> </div><div class="modal-body-extended"><iframe id="frameCurso"  width="100%" height="100%" frameborder="0" allowtransparency="true"></iframe></div></div></div></div>');
        modal.css({
            width: '100%',
            heigth : '100%',
            zIndex: '-9999',

        });
    };

    cursoModal.prototype.show = function(URL) {
        $(".modal-header").hide();
        $("#frameCurso").attr("src", URL);
        $("#modalCursoPlayer").modal({backdrop: 'static'});
        $("#modalCursoPlayer").modal("show");
        $(".cursoModal").css({
            zIndex: '9999',
        });
    };

    cursoModal.prototype.showUrl = function (URL) {
        $(".modal-header").show();
        $("#frameCurso").attr("src", URL);
        $("#modalCursoPlayer").modal({backdrop: 'static'});
        $("#modalCursoPlayer").modal("show");
    };


cursoModal.prototype.hide = function(){

    $(".cursoModal").css({
        zIndex: '-9999',
    });
    $("#modalCursoPlayer").modal("hide");
    $("#frameCurso").attr("src","about:blank");

};

    $(document).ready(function(){
        curso = new cursoModal();
    });
})(jQuery);
