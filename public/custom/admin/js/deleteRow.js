async function deleteRow(id, table) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: window.location.origin + '/admin/'+ table + '/delete/' + id,
            type: "DELETE",
            dataType: "json",
            success: function (response) {
                alert(response.message);
            }
        });
    }
}

