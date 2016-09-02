(function($) {
    $ = jQuery;
    var cursoModal = function(){
        var modal = $(".cursoModal").append('<div class="modal fade"  id="modalCursoPlayer" style="overflow-y:hidden"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog-expanded" ><div class="modal-content"><div class="modal-header span12"><button type="button" class="close" data-dismiss="modal">X</button><h4 class="modal-title">&nbsp;</h4> </div><div class="modal-body-extended"><iframe id="frameCurso"  width="100%" height="100%" frameborder="0" allowtransparency="true"></iframe></div></div></div></div>');

        modal.attr({
            class : 'span12',
        });
    };

    cursoModal.prototype.show = function(URL) {
        $('body').css({
            overflow: 'hidden',
        });
        $(".modal-header").hide();
        $("#frameCurso").attr("src", URL);

        // $("#modalCursoPlayer").modal();
        $('#frame-here').attr({
            class : 'span 10',
        });

        $('.jca-toc-holder').attr({
            class : 'jca-toc-holder span 2',
        });
        $("#modalCursoPlayer").modal("show");
        $('#modalCursoPlayer').css({
            overflow    : 'hidden',
            left        : '0px',
            width       : '100%',
            height      : '100%',
            top         : '0px',
        });
        $(".cursoModal").css({
            zIndex: '9999',
        });
    };

    cursoModal.prototype.showUrl = function (URL) {
        $(".modal-header").show();
        $("#frameCurso").attr("src", URL);
        $("#modalCursoPlayer").modal("show");
    };

    // {backdrop: 'static'}


    cursoModal.prototype.hide = function(){
        $('body').css({
            overflow: 'visible',
        });
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
