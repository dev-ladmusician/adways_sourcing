$(function () {
    $('#data-table').DataTable({
        "columns":[
            null,
            {"width" : "10%"},
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
        ],
        "order": [[ 0, "desc" ]],
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
    });

    $('.delete-item').click(function () {
        if (confirm("삭제하시겠습니까?")) {
            var domain = window.location.origin;
            var itemId = $(this).attr('id');
            window.location.href = domain + '/ADWAYS-MGMT/applicant/delete?applicantId=' + itemId;
        }
    });
});