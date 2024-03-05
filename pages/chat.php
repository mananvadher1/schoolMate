<?php include("../controller/chat_control.php"); ?>

<div class="container mt-5">
    <div class="row">
        <!-- User List (Left Side) -->
        <div class="col-md-3 border">
            <h4>Users</h4>
            <ul class="list-group">
                <li class="list-group-item">User 1</li>
                <li class="list-group-item">User 2</li>
                <li class="list-group-item">User 3</li>
                <!-- Add more users here -->
            </ul>
        </div>

        <!-- Chat Section (Right Side) -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Chat Room
                </div>
                <div class="card-body">
                    <!-- Display chat messages here -->
                    <div class="mb-3">
                        <strong>User 1:</strong> Hello!
                    </div>
                    <div class="mb-3">
                        <strong>User 2:</strong> Hi there!
                    </div>
                    <!-- Add more chat messages here -->
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <!-- Input field for sending messages -->
                        <input type="text" class="form-control me-2" placeholder="Type your message...">
                        <!-- Send button -->
                        <button class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php"); ?>