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
            <div class="input-group px-2">
                <input type="search" id="user-search" class="form-control my-3" placeholder="Search users..." onkeyup="filterUsers()">
            </div>
            <div class="card-body overflow-auto pt-0" style="height: 63vh;">
                <ul class="list-group" id="user-list">
                    <?php
                    if (isset($_GET['id']) && !empty($_GET['id'])) {
                        $id = $_GET['id'];
                    } else {
                        $id = 0;
                    }
                    ?>
                    <input type="hidden" id="userId" name="userId" value="<?php echo $id; ?>">
                    <?php while ($row = mysqli_fetch_assoc($re_user)) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="d-flex flex-column">
                                <a href="chatroom.php?id=<?php echo $row['id']; ?>"><?= $row['first_name'] . ' ' . $row['last_name'] ?></a>
                                <small class="text-muted"><?= $row['email'] ?></small>
                            </span>
                            <?php if ($row['loggedin'] == 1) : ?>
                                <span class="badge bg-primary rounded-pill">Online</span>
                            <?php else : ?>
                                <span class="badge bg-danger rounded-pill">Offline</span>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
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
    $(document).ready(function() {
        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            console.log(e.data);
            var data = JSON.parse(e.data);
            var isSelfMessage = data.userId === $('#userId').val();
            if (!isSelfMessage) {
                var row = '<div class="mb-3 d-flex justify-content-between align-items-center"><div class="d-flex flex-row align-items-center"><img src="../dist/img/user_image/' + data.img + '" class="rounded-circle" width="40" height="40" mr-1>&nbsp;<strong>' + data.from + ':</strong>&nbsp;' + data.msg + '</div><span class="badge bg-secondary ml-1">' + data.dt + '</span></div>';
            } else {
                var row = '<div class="mb-3 d-flex justify-content-between align-items-center"><span class="badge bg-secondary mr-1">' + data.dt + '</span><div class="d-flex flex-row align-items-center"><strong>You:</strong>&nbsp;' + data.msg + '&nbsp;<img src="../dist/img/user_image/' + data.img + '" class="rounded-circle mt-2" width="40" height="40" /></div></div>';
            }
            $('#chat_box').append(row);
            addMessageAndScroll();
        };

        function sendMessage() {
            var userId = $('#userId').val();
            var formUserId = "<?php echo $_SESSION['id']; ?>";
            var msg = $('#msg').val();
            var data = {
                formUserId: formUserId,
                userId: userId,
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