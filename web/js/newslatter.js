$("[role='form']").on('submit',function () {
    var form=$(this);

    form.find(".list-group .list-group-item").addClass('hide');

    var email=$(this).find("#email").val();
    $.ajax({
        method:'POST'
        ,url:'/addNewsletter.json'
        ,data: {email: email}
    }).done(function () {
        form.find(".list-group .list-group-item-success").removeClass('hide');
    }).fail(function (jqXHR, textStatus,error) {
        var json=JSON.parse(jqXHR.responseText);
        form.find(".list-group .list-group-item-danger").html('error').text(json['message']).removeClass('hide');
    });
    return false;
});