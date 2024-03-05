<?php include("../controller/chat_control.php"); ?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="header">
                <h1>Chat Room</h1>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="user-list">
                <h3>User List</h3>
                <ul class="list-group">
                    <li class="list-group-item">User 1</li>
                    <li class="list-group-item">User 2</li>
                    <li class="list-group-item">User 3</li>
                    <li class="list-group-item">User 4</li>
                    <!-- Add more users here -->
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="chat-section">
                <div class="chat-container">
                    <div class="card">
                        <div class="card-body">
                            <h3>Chats</h3>
                            <p>User 1: Hello</p>
                            <p>User 2: Hi there!</p>
                            <!-- Add more messages here -->
                        </div>
                    </div>
                </div>
                <div class="message-input mt-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type your message...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php"); ?>