<?php include("../controller/chat_control.php"); ?>

<div class="container mt-5 chat-app">
    <div class="row">
        <div class="col-md-4 card mx-2 p-0">
            <div class="card-header">
                Users
            </div>
            <div class="input-group px-2">
                <input type="search" id="user-search" class="form-control my-3" placeholder="Search users..." onkeyup="filterUsers()">
            </div>
            <div class="card-body overflow-auto pt-0" style="height: 63vh;">
                <ul class="list-group" id="user-list">
                    <input type="hidden" id="userId" name="userId" value="<?php echo $_SESSION['id']; ?>" >
                    <?php while($row = mysqli_fetch_assoc($re_user)){
                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="d-flex flex-column">
                                        <strong>'.$row['first_name'].' '.$row['last_name'].'</strong>
                                        <small class="text-muted">'.$row['email'].'</small>
                                    </span>
                                    <span class="badge bg-primary rounded-pill">Online</span>
                                </li>';
                    } ?>
                </ul>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Chat Room
                </div>
                <div class="card-body overflow-auto" style="height: 63vh;">
                    <div class="mb-3 text-end">
                        <!-- <img src="#" class="rounded-circle" width="40" height="40" margin-right="10"> -->
                        <strong>User 1:</strong> Hello!
                        <span class="badge bg-secondary" margin-left="10">10:23 AM</span>
                    </div>
                    <div class="mb-3 text-start">
                        <span class="badge bg-secondary" margin-right="10">10:25 AM</span>
                        <strong>User 2:</strong> Hi there!
                        <!-- <img src="#" class="rounded-circle" width="40" height="40" margin-left="10"> -->
                    </div>
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <input type="text" class="form-control me-2 rounded mr-1" id="msg" placeholder="Type your message...">
                        <button class="btn btn-primary ms-2 rounded ml-1" id="send" >Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            console.log(e.data);
        };

        $('#send').click(function(){
            var userId = $('#userId').val();
            var msg = $('#msg').val();
            data = {
                userId: userId,
                msg: msg
            }
            conn.send(JSON.stringify(data));
        })
    });
    // // jQuery function to filter users based on search input
    // function filterUsers() {
    //     // Get the search input value and convert it to uppercase
    //     var filter = $("#user-search").val().toUpperCase();
    //     // Get the user list items
    //     var li = $("#user-list li");
    //     // Loop through the user list items and hide those that don't match the search input
    //     li.each(function() {
    //         var user = $(this).text();
    //         if (user.toUpperCase().indexOf(filter) > -1) {
    //             $(this).show();
    //         } else {
    //             $(this).hide();
    //         }
    //     });
    // }
</script>
<?php include("../includes/footer.php"); ?>