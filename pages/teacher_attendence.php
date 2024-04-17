<?php include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");
$class = " SELECT class_id, class_name From `classes`";
$re_class = mysqli_query($conn, $class);
?>
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

    <!-- select Class -->
    <?php if ($_SESSION['role_id'] == 1) : ?>
        <div class="col-md-3">
            <div class="form-group">
                <label for="cls">Year:</label>
                <select class="form-control" name="cls" id="cls" required>
                    <?php while ($row = mysqli_fetch_assoc($re_class)) {
                        $selected = ($row['class_id'] == $_SESSION['class_id']) ? 'selected' : '';
                        echo '<option value="' . $row['class_id'] . '" ' . $selected . '>' . $row['class_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    <?php else : ?>
        <option id="cls" value="<?php echo $_SESSION['class_id']; ?>" selected></option>
    <?php endif; ?>
</div>

<div class="content">
    <div class="table-responsive">
        <table class="table table-hover " id="attendList" width="100%">
            <thead>
                <tr id="header">
                    <th>Name</th>
                    <th>Day 1</th>
                    <th>Day 2</th>
                    <th>Day 3</th>
                    <th>Day 4</th>
                    <th>Day 5</th>
                    <th>Day 6</th>
                    <th>Day 7</th>
                    <th>Day 8</th>
                    <th>Day 9</th>
                    <th>Day 10</th>
                    <th>Day 11</th>
                    <th>Day 12</th>
                    <th>Day 13</th>
                    <th>Day 14</th>
                    <th>Day 15</th>
                    <th>Day 16</th>
                    <th>Day 17</th>
                    <th>Day 18</th>
                    <th>Day 19</th>
                    <th>Day 20</th>
                    <th>Day 21</th>
                    <th>Day 22</th>
                    <th>Day 23</th>
                    <th>Day 24</th>
                    <th>Day 25</th>
                    <th>Day 26</th>
                    <th>Day 27</th>
                    <th>Day 28</th>
                    <th>Day 29</th>
                    <th>Day 30</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        var dataTable;

        var initialMonth = $('#month').val();
        var initialYear = $('#year').val();
        var class_id = $('#cls').val();

        // Initialize DataTable
        initializeDataTable(initialMonth, initialYear, class_id);

        $('#month, #year, #cls').on('change', function() {
            var month = $('#month').val();
            var year = $('#year').val();
            var cls = $('#cls').val();
            initializeDataTable(month, year, cls);
        });


        // Function to dynamically generate column headers
        function generateColumnHeaders(month, year) {
            var lastDay = new Date(year, month, 0).getDate();
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var headerContent = "";
            headerContent += "<th>Name</th>"; // Static column header for name
            for (var day = 1; day <= lastDay; day++) {
                var date = day + "-" + monthNames[month - 1];
                headerContent += "<th>" + date + "</th>";
            }
            $('#header').html(headerContent);
        }

        function initializeDataTable(initialMonth, initialYear, class_id) {
            // console.log(class_id);
            dataTable = $('#attendList').DataTable({
                "processing": true,
                "serverSide": true,
                "processData": false,
                "destroy": true,
                ajax: {
                    url: '../api/get_attend.php',
                    type: 'POST',
                    data: {
                        month: initialMonth,
                        year: initialYear,
                        class: class_id,
                        action: "get_attend"
                    },
                },
            });
            generateColumnHeaders(initialMonth, initialYear);
        }

    });
</script>
<?php include("../includes/footer.php"); ?>