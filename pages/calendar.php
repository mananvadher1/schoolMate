<?php 
include("../includes/db.php");
include("../includes/header.php"); 
include("../includes/sidebar.php");
?>

<!-- Calendar container -->
<div class="container">
    <div class="wrapper">
        <div id="calendar"></div>
    </div>
</div>

<!-- Event entry modal -->
<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Add New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-sm-12">  
                            <div class="form-group">
                                <label for="event_name">Event name</label>
                                <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Enter your event name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label for="event_start_date">Event start</label>
                                <input type="date" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Event start date">
                            </div>
                        </div>
                        <div class="col-sm-6">  
                            <div class="form-group">
                                <label for="event_end_date">Event end</label>
                                <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Event end date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
            </div>
        </div>
    </div>
</div>

<!-- Load calendar and event handling scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize FullCalendar
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 650,
        selectable: true,
        dateClick: function(info) {
            $('#event_entry_modal').modal('show'); // Show modal on date click
        }
    });
    calendar.render(); // Render the calendar

    // Function to fetch and display events
    function display_events() {
        var events = []; // Array to store events
        $.ajax({
            url: '../controller/calender_control.php',  
            dataType: 'json',
            success: function (response) {
                var result = response.data;
                // Loop through each event and add it to the array
                $.each(result, function (i, item) {
                    events.push({
                        event_id: result[i].event_id,
                        title: result[i].title,
                        start: result[i].start,
                        end: result[i].end,
                        color: result[i].color,
                        
                    }); 	
                });
                // Set events in the calendar
                calendar.addEventSource(events);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching events:", error);
            }
        });
    }

    // Call the function to display events
    display_events();
}); //end document.ready block

// Function to save event
function save_event() {
    var event_name = $("#event_name").val();
    var event_start_date = $("#event_start_date").val();
    var event_end_date = $("#event_end_date").val();
    if (event_name === "" || event_start_date === "" || event_end_date === "") {
        alert("Please enter all required details.");
        return false;
    }
    $.ajax({
        url: "../controller/calender_control.php",
        type: "POST",
        dataType: 'json',
        data: {
            event_name: event_name,
            event_start_date: event_start_date,
            event_end_date: event_end_date
        },
        success: function(response) {
            $('#event_entry_modal').modal('hide');
            if (response.status === true) {
                alert(response.msg);
                location.reload();
            } else {
                alert(response.msg);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error saving event:", error);
            alert("Error occurred while saving event. Please try again.");
        }
    });
    return false;
}
</script>

<?php include("../includes/footer.php"); ?>
