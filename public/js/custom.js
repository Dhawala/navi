$(document).ready(function () {

});

function allocationChannel(e,user_id,user_role) {
    if(user_role!='admin'){
        if(e.allocation.lecturer.user.id == user_id){
            $.notify('New Schedule allocated !'
                +e.allocation.schedule.id+" "
                +e.allocation.schedule.course_code+" "
                +e.allocation.schedule.ac_name
                +" To "+e.allocation.lecturer.name
                ,{
                    autoHideDelay: 50000,
                    className: "success"
                });
        }
    }else{
        $.notify('New Schedule allocated !'
            +e.allocation.schedule.id+" "
            +e.allocation.schedule.course_code+" "
            +e.allocation.schedule.ac_name
            +" To "+e.allocation.lecturer.name
            ,{
                autoHideDelay: 50000,
                className: "success"
            });
    }
}
function cancelChannel(e,user_id,user_role) {
    if(user_role=='admin') {

        $("#cancellationCount").html(e.cancellationCount);
        $.notify('New Cancellation Request !'            +e.allocationCancellation.allocation.schedule.id+" "
            +e.allocationCancellation.allocation.schedule.course_code+" "
            +e.allocationCancellation.allocation.schedule.ac_name
            +" By "+e.allocationCancellation.lecturer.name
            ,{
            autoHideDelay: 50000,
            className: "danger"
        });
    }

}

function approveChannel(e,user_id,user_role) {
    if (user_role != 'admin') {

        $("#cancellationCount").html(e.cancellationCount);
        $.notify('Cancellation Approved !'+e.allocationCancellation.allocation.schedule.id+" "
            +e.allocationCancellation.allocation.schedule.course_code+" "
            +e.allocationCancellation.allocation.schedule.ac_name
            +" By "+e.allocationCancellation.lecturer.name
            ,{
            autoHideDelay: 50000,
            className: "danger"
        });
    }
}


