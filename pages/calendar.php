<?php include ("../includes/db.php");
include ("../includes/header.php");
include ("../includes/sidebar.php");
 ?>

    <div class="px-5" id='calendar'></div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: <?php echo ($_SESSION['role_id'] == 1) ? 'true' : 'false'; ?>, // Set to false for role id 3
                selectable: <?php echo ($_SESSION['role_id'] == 1) ? 'true' : 'false'; ?>, // Set to false for role id 3
                eventClick: function (info) {
                    if(<?php echo ($_SESSION['role_id'] == 1) ? 'true' : 'false'; ?>) { // Execute only if role id is not 3
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
                    }
                },
                select: function (info) {
                    if(<?php echo ($_SESSION['role_id'] == 1) ? 'true' : 'false'; ?>) { // Execute only if role id is not 3
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
                    }
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
        $('#calendar-link').addClass('active');
    </script>


    <?php include ("../includes/footer.php"); ?>