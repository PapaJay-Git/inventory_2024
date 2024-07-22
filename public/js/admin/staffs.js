function giveDataToUpdateModal(id, name, username){
    $("#submitFormStaffUpdate").attr("onsubmit", "submitRequest({type: 'PATCH', url: '/staffs/"+id+"', pastAction: 'Update', futureAction: 'Updated', formId: 'submitFormStaffUpdate', nameOfContent: 'staff', showCannotBeUndone: false, callUpdatedData: true, resetForm: false })");
    $('#nameUpdate').val(name.toString());
    $('#usernameUpdate').val(username.toString());
}


function getUpdatedData(url = "/staffs"){
    var tbodystaff = $('#tbody-staff');
    var allow_requests_managementTag = $('meta[name="allow_requests_management"]');
    var allow_requests_managementValue = allow_requests_managementTag.length > 0
        ? allow_requests_managementTag.attr('data-isAllow')
        : true;

    staffTable.clear().draw();

    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function(){
            tbodystaff.html(loadingScreen());
        },
        success: function(response) {
         var count = 1;
         tbodystaff.html('');

         response.users.forEach(user => {
            var rowElement = document.createElement('tr');

            var onclickDeactivate = `onclick="submitRequest({ type: 'GET', url: '/activate_user/${user.id}', pastAction: 'Deactivate', futureAction: 'Deactivated', formId: 'none', nameOfContent: 'user', showCannotBeUndone: false, callUpdatedData: true, resetForm: false })"`;

            var onclickActivate = `onclick="submitRequest({ type: 'GET', url: '/activate_user/${user.id}', pastAction: 'Activate', futureAction: 'Activated', formId: 'none', nameOfContent: 'user', showCannotBeUndone: false, callUpdatedData: true, resetForm: false })"`;

            console.log(user.average_quality_review);
            var row = `
            <td>
                <a href="/profile/${user.username}"><small class="text-dark fw-bold">${user.name.toUpperCase()}</small></a>
            </td>
            <td>
                <a href="/profile/${user.username}"><small class="text-dark fw-bold">${user.username.toUpperCase()}</small></a>
            </td>
            <td>
                <small class="text-dark">${user.email.toUpperCase()}</small>
            </td>
            <td>
                <small class="text-primary fw-bold">${user.role.toUpperCase()}</small>
            </td>
            <td>
                <a href="/profile/${user.updated_by_username}" ${user.updated_by_username == 'DEFAULT' ? "onclick='return false'" : ''}>
                    <small class="text-dark fw-bold">${user.updated_by_department+', '}${user.updated_by_name}</small>
                </a>
            </td>
            <td>
                <small class="text-dark">${ dateToHuman(user.updated_at)}</small>
            </td>
            <td>
                ${showOneColStarReview(user.average_quality_review, user.average_timeliness_review, user.average_completeness_review, user.reviewed_request_count)}
            </td>
            <td>
                ${allow_requests_managementValue == true ?
                    `<span class="btn-span text-primary border bg-light p-1 me-1 rounded fw-bold position-relative" onclick="window.location.href='/staffs/${user.id}'">HANDLED <span class="position-absolute top-0 start-100 custom-z-index-5 translate-middle badge rounded-pill bg-danger"> ${user.handled_count} </span> </span>`
                    : ''
                }
                ${
                    `<span class="btn-span text-primary border bg-light p-1 me-1 rounded fw-bold position-relative" onclick="window.location.href='/requests_by_staff/${user.id}'">REQUESTS <span class="position-absolute top-0 start-100 custom-z-index-5 translate-middle badge rounded-pill bg-danger"> ${user.request_count} </span> </span>`
                }
                ${user.user_id === null || user.user_id === "" ?

                `<span class="btn-span text-success border bg-light p-1 rounded fw-bold" ${onclickDeactivate} id="btn-id-${user.id}">ACTIVE</span>` :
                `<span class="btn-span text-dark border bg-light p-1 rounded fw-bold" ${onclickActivate}>INACTIVE</span>`}
                <span class="btn-span text-primary border bg-light p-1 rounded fw-bold" data-bs-toggle="modal" data-bs-target="#updateUserModal" onclick="giveDataToUpdateModal('${user.id}', '${user.name.toUpperCase()}', '${user.username}')">UPDATE</span>

                ${
                    user.associated_requests == 0 && user.associated_messages == 0 ?
                    `
                        <form method="POST" id="submitFormUpdate${user.id}" class="d-inline-block">
                            <input type="hidden" name="_token" value="${csrfToken}" autocomplete="off">
                            <span class="btn-span text-danger fw-bold border bg-light p-1 rounded"  onclick="submitRequest({ type: 'DELETE', url: '/staffs/${user.id}', pastAction: 'DELETE', futureAction: 'DELETED', formId: 'submitFormUpdate${user.id}', nameOfContent: 'staff', showCannotBeUndone: true, callUpdatedData: true, resetForm: false, closeModal: false })">DELETE</span>
                        </form>
                    `
                    :
                    `
                        <span class="btn-span-disabled text-gray fw-bold border bg-secondary p-1 rounded ">DELETE</span>
                    `
                }

            </td>`;


            rowElement.innerHTML = row;
            staffTable.row.add(rowElement).draw(false);

         });
            if(response.users.length <= 0){
                tbodystaff.html(generateNoDataRow({ colspan: 8}));
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            if (xhr.status === 422) {
                Swal.fire({title: 'PROBLEM', text: xhr.responseJSON.error.toString(), icon: 'error'});
            }else{
                Swal.fire({title: textStatus.toUpperCase(), text: errorThrown.toString(), icon: 'error'});
            }
            tbodystaff.html(`<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">There's a problem fetching your data.</td></tr>`);
        }
    });
}


getUpdatedData();
