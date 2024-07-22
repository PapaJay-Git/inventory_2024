

var dataLoading = false;
var defaultURL = '/specific_department_monthly_requests/all'
function getUpdatedData(url = defaultURL){

    var date = document.getElementById('date');
    var formData =  $('#statisticsForm').serialize();

    var tbody_department = $('#tbody-department');

    if(!dataLoading && date && date.value != ''){
        dataLoading = true;

        requestsTable.clear().draw();

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            beforeSend: function(){
             tbody_department.html(loadingScreen());
            },
            success: function(response) {

             tbody_department.html('');
             response.requests.forEach(request => {

                    var rowElement = document.createElement('tr');

                    rowElement.innerHTML = requestTableRow({
                        request: request, requests_categories: response.requests_categories
                    });

                    requestsTable.row.add(rowElement).draw(false);

                });

                if(response.requests.length <= 0){
                    tbody_department.html(generateNoDataRow({ colspan: 12}));
                }

                dataLoading = false;

            },
            error: function(xhr, textStatus, errorThrown) {
                if (xhr.status === 422) {
                    Swal.fire({title: 'PROBLEM', text: xhr.responseJSON.error.toString(), icon: 'error'});
                }else{
                    Swal.fire({title: textStatus.toUpperCase(), text: errorThrown.toString(), icon: 'error'});
                }
                dataLoading = false;
                tbody_department.html(`<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">There's a problem fetching your data.</td></tr>`);
            }
        });
    }

}
