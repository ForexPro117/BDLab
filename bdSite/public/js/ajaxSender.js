/*$("#logBtn").on('click', () => $("#BDtitle").html("<h1>Ты зачем нажал на кнопку!!!!<h1>"));
$("#regBtn").on('click', () =>
    $.ajax({
        url: "/regDev",
        type: "POST",
        data: ({_token: $('#csrf-token')[0].content, name: "artem", age: 5}),
        dataType: "json",
        success: (data) => {
            location = data.location
        }

    }).fail(() => console.log("FAIL")));*/
//dbl
$(".dataPick").dblclick((eventData) => {
    let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    let data = eventData.currentTarget.children;//array.textconent
    let tableName = eventData.currentTarget.offsetParent.id;
    let rowsName = eventData.currentTarget.parentElement.firstChild;
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
/*
$(".del-bnt").on('click', (eventData) =>{

    console.log(eventData)
});
*/


