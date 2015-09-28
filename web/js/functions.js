function selectItem(url, header, returntoid, returntovalue) {
    $("#modalbox .modal-header h3").html(header);
    $.post("index.php?r=" + url, {returntoid:returntoid, returntovalue:returntovalue}, function (result) {
        $("#modalbox .modal-body").html(result);
    });    
}
