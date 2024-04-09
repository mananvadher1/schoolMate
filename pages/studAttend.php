<?php include("../controller/attendance_control.php"); ?>
<style>
    /* Apply vertical borders between table cells */
    #attendence th,
    #attendence td {
        border-right: 1px solid #ddd;
        /* Adjust color and thickness as needed */
    }

    .heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<div class="row m-3">
    <!-- Month select -->
    <div class="col-md-3">
        <div class="form-group">
            <label for="month">Month:</label>
            <select class="form-control" name="month" id="month" required>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $monthName = date("F", mktime(0, 0, 0, $i, 1));
                    $selected = ($i == date('n')) ? 'selected' : '';
                    echo '<option value="' . $i . '" ' . $selected . '>' . $monthName . '</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <!-- Year select -->
    <div class="col-md-3">
        <div class="form-group">
            <label for="year">Year:</label>
            <select class="form-control" name="year" id="year" required>
                <?php
                $currentYear = date("Y");
                for ($year = $currentYear - 10; $year <= $currentYear + 10; $year++) {
                    $selected = ($year == date('Y')) ? 'selected' : '';
                    echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <table class="table table-hover " id="attendList" width="100%">
            <thead>
                <tr id='header'>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#month, #year').on('change', function() {
            var month = $('#month').val();
            var year = $('#year').val();
            // if($("#attendList_wrapper").length == 0)
            // {

            // }
            // else
            // {
            //     $('#attendList').DataTable({
            //     "bDestroy": true,
            //     });
            //     alert("madyo mane");
            // }

            // console.log("yes");
            // generateMonthColumns(month, year);
            userDataTable(month, year);
            // console.log("no");
        });
    });

    // function generateMonthColumns(month, year) {

    //     $('#header').empty();
    //     var headerContent = '<th>Name</th>';
    //     var lastDay = new Date(year, month, 0).getDate();
    //     var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    //         "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    //     ];
    //     console.log(lastDay)

    //     for (var day = 1; day <= lastDay; day++) {
    //         var date = new Date(year, month - 1, day);
    //         var formattedDate = day + ' ' + monthNames[date.getMonth()];
    //         console.log(formattedDate)
    //         headerContent += '<th>' + formattedDate + '</th>';

    //     }
    //     $('#header').append(headerContent);
    // }


    function userDataTable(month, year) {
        var lastDay = new Date(year, month, 0).getDate();
        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var columns = [{
            "data": null,
            "render": function(data, type, row) {
                return data.name; // Changed to use 'name' field
            },
            "title": "Name"
        }];
        for (var day = 1; day <= lastDay; day++) {
            var dayStr = day + "-" + monthNames[month - 1];
            columns.push({
                "data": function(row) {
                    var attendanceData = row.attendance[dayStr];
                    return attendanceData !== undefined ? attendanceData : ''; // Corrected line
                },
                "title": dayStr
            });
        }

        $('#attendList').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            ajax: {
                url: '../api/get_attend.php',
                type: 'POST',
                data: {
                    month: month,
                    year: year,
                    action: "get_attend"
                },
            },
            "columns": columns
        });
    }
</script>
<?php include("../includes/footer.php"); ?>