<?php
    
 include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php"); ?>

<div id='calendar'></div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        editable: true,
        selectable: true,
        eventClick: function(info) {
            var id = info.event.id;
            if (confirm("Are you sure you want to delete this event?")) {
                $.ajax({
                    url: '../controller/calender_control.php',
                    type: 'POST',
                    data: { action: 'delete_event', id: id },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status == 'success') {
                            calendar.refetchEvents();
                        } else {
                            alert(result.message);
                        }
                    }
                });
            }
        },
        select: function(info) {
            var title = prompt('Event Title:');
            if (title) {
                var eventData = {
                    title: title,
                    start: info.startStr,
                    end: info.endStr
                };

                $.ajax({
                    url: '../controller/calender_control.php',
                    type: 'POST',
                    data: { action: 'add_event', title: title, start: info.startStr, end: info.endStr },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status == 'success') {
                            calendar.addEvent(eventData);
                        } else {
                            alert(result.message);
                        }
                    }
                });
            }
        },
        events: function(info, successCallback, failureCallback) {
            $.ajax({
                url: '../controller/calender_control.php',
                type: 'POST',
                data: { action: 'fetch_events' },
                success: function(response) {
                    successCallback(JSON.parse(response));
                },
                error: function(error) {
                    failureCallback(error);
                }
            });
        }
    });

    calendar.render();
});

</script>


<?php include("../includes/footer.php"); ?>
