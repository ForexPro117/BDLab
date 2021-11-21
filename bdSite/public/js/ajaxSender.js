$(".dataPick").dblclick((eventData) => {
    target = eventData;
    myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    data = eventData.currentTarget.children;//array.textconent
    tableName = eventData.currentTarget.offsetParent.id;
    rowsName = eventData.currentTarget.parentElement.firstChild;
    $("#modalTitle").get(0).innerHTML = tableName;
    $("#modal-body").empty();
    for (let i = 0; i < data.length; i++) {
        $(`<label class="form-label" >Поле: ${rowsName.children[i].textContent}</label>`).appendTo('#modal-body')
        if (rowsName.children[i].textContent.includes('ID'))
            $(`<input type="text" class="form-control mb-3" value="${data[i].textContent}">`).appendTo('#modal-body').prop("disabled", true);
        else
            $(`<input type="text" class="form-control mb-3" value="${data[i].textContent}">`).appendTo('#modal-body');
    }
    myModal.show();
});
$("#btn-Change").click(() => {
    if (confirm("Вы деийствительно хотите изменить данные?")) {
        let strokes = $('#modal-body').find(':input');
        let rows = new Map();
        for (i = 0; i < strokes.length; i++) {
            rows.set(rowsName.children[i].textContent, strokes[i].value)
        }
        $.ajax({
            url: "/bdView",
            type: "POST",
            data: ({_token: $('#csrf-token')[0].content, 'tableName': tableName, "data": Object.fromEntries(rows)}),
            dataType: "text"

        })
            .done(() => {
                $(`<div class="alert alert-success container" id="msg">
            Данные успешно изменены!</div>`).prependTo('#accordionExample');
                $('#exampleModal').modal('hide');
                for (i = 0; i < strokes.length; i++)
                    data[i].textContent = strokes[i].value;
                setTimeout(() => $('#msg').remove(), 5000);
            })
            .fail(() => {
                $('#exampleModal').modal('hide');
                $(`<div class="alert alert-danger container" id="msg">
            Произошла ошибка при изменении данных!</div>`).prependTo('#accordionExample');
                setTimeout(() => $('#msg').remove(), 5000);
            });
    }
});
$("#btn-Delete").click(() => {
    if (confirm("Вы деийствительно хотите удалить данные?")) {
        let strokes = $('#modal-body').find(':input');
        $.ajax({
            url: '/bdView/delete',
            type: "POST",
            data: ({_token: $('#csrf-token')[0].content, 'tableName': tableName, "ID": strokes[0].value}),
            dataType: "text"

        })
            .done(() => {
                $(`<div class="alert alert-success container" id="msg">
            Данные успешно удалены!</div>`).prependTo('#accordionExample');
                $('#exampleModal').modal('hide');
                target.currentTarget.remove();
                setTimeout(() => $('#msg').remove(), 5000);
            })
            .fail(() => {
                $('#exampleModal').modal('hide');
                $(`<div class="alert alert-danger container" id="msg">
            Произошла ошибка при удалении данных!</div>`).prependTo('#accordionExample');
                setTimeout(() => $('#msg').remove(), 5000);
            });
    }
});

