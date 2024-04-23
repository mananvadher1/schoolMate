<?php include("../controller/chat_control.php"); ?>

<div class="container mt-5 chat-app">
    <div class="row">
        <div class="col-md-4 card mx-2 p-0">
            <div class="card-header">
                <?php while ($row = mysqli_fetch_assoc($re_me)) : ?>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column align-items-center mx-auto">
                            <img src="../dist/img/user_image/<?= $row["profile_img"] ?>" class="rounded-circle" width="70" height="70" mr-1>
                            <strong><?= $row['first_name'] . ' ' . $row['last_name'] ?></strong>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- search user -->
            <div class="input-group px-2">
                <input type="search" id="user-search" class="form-control my-3" placeholder="Search users..." onchange="filterUsers()">
            </div>
            <!-- user list -->
            <div class="card-body overflow-auto pt-0" style="height: 50vh;">
                <ul class="list-group" id="user-list">
                    <?php
                    if (isset($_GET['id']) && !empty($_GET['id'])) {
                        $id = $_GET['id'];
                    } else {
                        $id = 0;
                    }
                    ?>
                    <div id="users">
                        <input type="hidden" id="userId" name="userId" value="<?php echo $id; ?>">
                        <?php while ($row = mysqli_fetch_assoc($re_user)) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="d-flex flex-column">
                                    <a href="chatroom.php?id=<?php echo $row['id']; ?>">
                                        <?= $row['first_name'] . ' ' . $row['last_name'] ?>
                                        <?php
                                        // Display role name based on role ID
                                        $role_name = '';
                                        switch ($row['role_id']) {
                                            case 1:
                                                $role_name = '<span class="text-success fw-bold">Principal</span>';
                                                break;
                                            case 2:
                                                $role_name = '<span class="text-success fst-italic">Teacher</span>';
                                                break;
                                            case 3:
                                                $role_name = '<span class="text-success text-decoration-underline">Student</span>';
                                                break;
                                            default:
                                                $role_name = '<span class="text-danger fw-bold">Unknown</span>';
                                                break;
                                        }
                                        echo "(" . $role_name . ")";
                                        ?>
                                    </a>
                                    <small class="text-muted"><?= $row['email'] ?></small>
                                </span>
                                <?php if ($row['loggedin'] == 1) : ?>
                                    <span class="badge bg-primary rounded-pill">Online</span>
                                <?php else : ?>
                                    <span class="badge bg-danger rounded-pill">Offline</span>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </div>
                </ul>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <?php if (isset($_GET['id']) && !empty($_GET['id'])) : ?>
                        <?php while ($row = mysqli_fetch_assoc($re_chat_name)) : ?>
                            <span class="d-flex flex-row">
                                <strong><?= $row['first_name'] . ' ' . $row['last_name'] ?></strong>
                                &nbsp;:&nbsp;
                                <small class="d-flex align-items-center"><?= $row['email'] ?></small>
                            </span>
                        <?php endwhile; ?>
                    <?php else : ?>
                        Chat
                    <?php endif; ?>
                </div>
                <div class="card-body overflow-auto" style="height: 63vh;" id="chat_box">
                    <!-- Data coming from jQuery and socket -->
                    <?php if (isset($_GET['id']) && !empty($_GET['id'])) : ?>
                        <?php while ($row = mysqli_fetch_assoc($chat_re)) : ?>
                            <?php if ($row['id'] == $_SESSION['id']) : ?>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="badge bg-secondary mr-1"><?= date("d/m/Y h:i:s A", strtotime($row["msg_time"])) ?></span>
                                    <div class="d-flex flex-row align-items-center">
                                        <strong>You:</strong>&nbsp;
                                        <div class="d-flex wrap"><?= $row["msg"] ?></div>&nbsp;
                                        <img src="../dist/img/user_image/<?= $row["profile_img"] ?>" class="rounded-circle mt-2" width="40" height="40" />
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="../dist/img/user_image/<?= $row["profile_img"] ?>" class="rounded-circle" width="40" height="40" mr-1>&nbsp;
                                        <strong><?= $row["first_name"] ?> <?= $row["last_name"] ?>:</strong>&nbsp;
                                        <div class="message-wrap"><?= $row["msg"] ?></div>
                                    </div>
                                    <span class="badge bg-secondary ml-1"><?= date("d/m/Y h:i:s A", strtotime($row["msg_time"])) ?></span>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-footer">
                <div class="input-group">
                    <input type="text" class="form-control me-2 rounded mr-1" id="msg" placeholder="Type your message...">
                    <button class="btn btn-primary ms-2 rounded ml-1" id="send">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // $('#user-search').on('change', function(){
    //     console.log(1)
    // })

    $(document).ready(function() {
        var conn = new WebSocket('ws://192.168.24.97:8081');
        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            // console.log(e.data);
            var data = JSON.parse(e.data);
            var isSelfMessage = data.toUserId === $('#userId').val();
            if (!isSelfMessage) {
                var row = '<div class="mb-3 d-flex justify-content-between align-items-center"><div class="d-flex flex-row align-items-center"><img src="../dist/img/user_image/' + data.img + '" class="rounded-circle" width="40" height="40" mr-1>&nbsp;<strong>' + data.from + ':</strong>&nbsp;' + data.msg + '</div><span class="badge bg-secondary ml-1">' + data.dt + '</span></div>';
            } else {
                var row = '<div class="mb-3 d-flex justify-content-between align-items-center"><span class="badge bg-secondary mr-1">' + data.dt + '</span><div class="d-flex flex-row align-items-center"><strong>You:</strong>&nbsp;' + data.msg + '&nbsp;<img src="../dist/img/user_image/' + data.img + '" class="rounded-circle mt-2" width="40" height="40" /></div></div>';
                $('#chat_box').append(row);
            }
            if (data.toUserId == <?php echo $_SESSION['id']; ?> && data.formUserId == <?php echo $_GET['id']; ?>) {
                $('#chat_box').append(row);
            }
            addMessageAndScroll();
        };

        function sendMessage() {
            var toUserId = $('#userId').val();
            var formUserId = "<?php echo $_SESSION['id']; ?>";
            var msg = $('#msg').val();
            var data = {
                formUserId: formUserId,
                toUserId: toUserId,
                msg: msg
            };
            conn.send(JSON.stringify(data));
            $('#msg').val("");
        }

        function addMessageAndScroll() {
            var container = $("#chat_box");
            container.scrollTop(container[0].scrollHeight);
        }
        addMessageAndScroll();

        $('#send').click(function() {
            sendMessage();
        });
        $('#msg').keypress(function(event) {
            if (event.which == 13) {
                sendMessage();
            }
        });

    });
    // jQuery function to filter users based on search input
    function filterUsers() {
        var user_role = <?php echo $_SESSION['role_id']; ?>;
        // if (user_role != 1) {
        //     var class_id = <?php echo $_SESSION['class_id']; ?>;
        // }else{
        //     var class_id = 0;
        // }
        var user_id = <?php echo $_SESSION['id']; ?>;
        // // Get the search query from the input field
        var searchQuery = document.getElementById("user-search").value.toLowerCase();
        $.ajax({
            url: "../api/search_user.php",
            method: "POST",
            data: {
                id: user_id,
                user_role: user_role,
                // user_class: class_id,
                search: searchQuery,
                action: 'search_user'
            },
            dataType: "json",
            success: function(data) {
                $("#users").empty(); // Clear existing user list items

                // Check if data is empty or not
                if (data.length > 0) {
                    // Data is not empty, iterate through each user data returned from the API
                    data.forEach(function(row) {
                        var role_name = ''; // Initialize role_name variable

                        // Determine role_name based on role_name field from API
                        switch (row.role_name) {
                            case 'Principal':
                                role_name = '<span class="text-success fw-bold">Principal</span>';
                                break;
                            case 'Teacher':
                                role_name = '<span class="text-success fst-italic">Teacher</span>';
                                break;
                            case 'Student':
                                role_name = '<span class="text-success text-decoration-underline">Student</span>';
                                break;
                            default:
                                role_name = '<span class="text-danger fw-bold">Unknown</span>';
                                break;
                        }

                        // Construct HTML for each user
                        var userHtml = '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                            '<span class="d-flex flex-column">' +
                            '<a href="chatroom.php?id=' + row.id + '">' +
                            row.first_name + ' ' + row.last_name + ' ' + '(' + role_name + ')' +
                            '</a>' +
                            '<small class="text-muted">' + row.email + '</small>' +
                            '</span>';

                        // Determine online/offline status
                        var statusBadge = (row.loggedin == 1) ?
                            '<span class="badge bg-primary rounded-pill">Online</span>' :
                            '<span class="badge bg-danger rounded-pill">Offline</span>';

                        // Append status badge to userHtml
                        userHtml += statusBadge;

                        // Append userHtml to user-list
                        $("#users").append(userHtml);
                    });
                } else {
                    // If data is empty, display a message indicating no users found
                    $("#users").html("<li>No users found</li>");
                }
            }

        });
    }
</script>
<?php include("../includes/footer.php"); ?>