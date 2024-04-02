<?php
include ("../includes/db.php");
include ("../includes/header.php");
include ("../includes/sidebar.php");
?>

<div id='calendar'></div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: true,
            selectable: true,
            eventClick: function (info) {
                var id = info.event.id;
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Are you sure you want to delete this event?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../controller/calender_control.php',
                            type: 'POST',
                            data: { action: 'delete_event', id: id },
                            success: function (response) {
                                var result = JSON.parse(response);
                                if (result.status == 'success') {
                                    calendar.refetchEvents();
                                } else {
                                    Swal.fire('Error', result.message, 'error');
                                }
                            }
                        });
                    }
                });
            },
            select: function (info) {
                Swal.fire({
                    title: 'Event Title',
                    input: 'text',
                    inputPlaceholder: 'Enter event title',
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    showLoaderOnConfirm: true,
                    preConfirm: (title) => {
                        return $.ajax({
                            url: '../controller/calender_control.php',
                            type: 'POST',
                            data: { action: 'add_event', title: title, start: info.startStr, end: info.endStr },
                            success: function (response) {
                                var result = JSON.parse(response);
                                if (result.status == 'success') {
                                    calendar.addEvent({
                                        title: title,
                                        start: info.startStr,
                                        end: info.endStr
                                    });
                                    Swal.fire('Success!', 'Your event has been added successfully!', 'success');
                                } else {
                                    Swal.fire('Error', result.message, 'error');
                                }
                            }
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });
            },
            events: function (info, successCallback, failureCallback) {
                $.ajax({
                    url: '../controller/calender_control.php',
                    type: 'POST',
                    data: { action: 'fetch_events' },
                    success: function (response) {
                        successCallback(JSON.parse(response));
                    },
                    error: function (error) {
                        failureCallback(error);
                    }
                });
            }
        });

        calendar.render();
    });
</script>

<?php include ("../includes/footer.php"); ?>