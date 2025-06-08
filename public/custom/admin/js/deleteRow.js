async function deleteRow(id, table) {
    let returnValue = false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
   
    $.ajax({
        url: window.location.origin + '/admin/'+ table + '/delete/' + id,
        type: "DELETE",
        dataType: "json",
        success: function (response) {
            returnValue = true;
            alert(response.message);
        }
    });
    return returnValue;
}

