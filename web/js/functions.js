function selectItem(url, header, returntoid, returntovalue) {
    $("#modalbox .modal-header h3").html(header);
    $.post("index.php?r=" + url, {returntoid: returntoid, returntovalue: returntovalue}, function (result) {
        $("#modalcontainer").html(result);
    });
}
function queryItem(code, url, inputid, inputname) {
    if (code.length === 3) {
//        $.post("index.php?r=" + url, {code: code}, function (json) {
//            var result = $.parseJSON(json);
//            $("#" + inputid).val(parseInt(result["id"]));
//            $("#" + inputname).val(result["name"]);
//        }, "json");
        $.ajax({
            url: 'index.php?r=' + url,
            type: 'post',
            data: {code: code},
            dataType: 'json',
            complete: function (data) {
                var result = JSON.parse(data.responseText);
                $("#" + inputid).val(parseInt(result["id"]));
                $("#" + inputname).val(result["name"]);
            }
        });
    } else {
        $("#" + inputid).val("");
        $("#" + inputname).val("");
    }
}

function btnSelectClick(btn, inputid, inputcode, inputname) {
    $("#" + inputid).val(btn.data("id"));
    $("#" + inputcode).val(btn.data("code"));
    $("#" + inputname).val(btn.data("name"));
    $("button.close").click();
}