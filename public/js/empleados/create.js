$(document).ready(function() {

    /* $(".roles").on({
        click: function() {
            var $rol = $(this);
            if ($rol.is(":checked")) {
                var group = "input:checkbox[name='" + $rol.attr("name") + "']";
                $(group).prop("checked", false);
                $rol.prop("checked", true);
            } else {
                $rol.prop("checked", false);
            }
        }
    }); */

    $(".boletin").on({
        click: function() {
            var $bol = $(this);
            if ($bol.is(":checked")) {
                $('input[name=boletin]').val("1");
            }else{
                $('input[name=boletin]').val("0");
            }

        }
    });
});