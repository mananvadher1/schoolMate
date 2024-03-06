remove all inline css from this code : <div class="container mt-5 chat-app">
    <div class="row">
        <!-- User List (Left Side) -->
        <div class="col-md-3 card mx-2 p-0xx" style="border: 2px solid #007bff; box-shadow: 0 0 10px #007bff;">
            <div class="card-header" style="background-color: #007bff; color: white;">
                Users
            </div>
            <div class="card-body">
                <!-- Search bar for users -->
                <input type="search" id="user-search" class="form-control" placeholder="Search users..." onkeyup="filterUsers()">
                <ul class="list-group card-body" id="user-list" style="height: 61vh; overflow-y: auto;">
                    <li class="list-group-item" style="background-color: #f0f0f0;">User 1</li>
                    <li class="list-group-item" style="background-color: #f0f0f0;">User 2</li>
                    <li class="list-group-item" style="background-color: #f0f0f0;">User 3</li>
                    <!-- Add more users here -->
                </ul>
            </div>
        </div>

        <!-- Chat Section (Right Side) -->
        <div class="col-md-8">
            <div class="card" style="border: 2px solid #007bff; box-shadow: 0 0 10px #007bff;">
                <div class="card-header" style="background-color: #007bff; color: white;">
                    Chat Room
                </div>
                <div class="card-body" style="height: 63vh; overflow-y: auto;">
                    <!-- Display chat messages here -->
                    <div class="mb-3 text-end">
                        <img src="user1.jpg" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
                        <strong>User 1:</strong> Hello!
                        <span class="badge bg-secondary" style="margin-left: 10px;">10:23 AM</span>
                    </div>
                    <div class="mb-3 text-start">
                        <span class="badge bg-secondary" style="margin-right: 10px;">10:25 AM</span>
                        <strong>User 2:</strong> Hi there!
                        <img src="user2.jpg" class="rounded-circle" style="width: 40px; height: 40px; margin-left: 10px;">
                    </div>
                    <!-- Add more chat messages here -->
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <!-- Input field for sending messages -->
                        <input type="text" class="form-control me-2 rounded" placeholder="Type your message...">
                        <!-- Send button -->
                        <button class="btn btn-primary ms-2 rounded">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

and all removed css bind with this css :         * {
            font-family: "Roboto", sans-serif;
        }

        Add some margin and padding to the container
        .chat-app .container {
            margin: 20px;
            padding: 10px;
        }

        /* Add some border and background color to the card elements */
        .chat-app .card {
            border: 1px solid #ccc;
            background-color: #f0f0f0;
        }

        /* Add some spacing and alignment to the input group elements */
        .chat-app .input-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Add some color and hover effect to the send button */
        .chat-app .btn {
            color: white;
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .chat-app .btn:hover {
            background-color: #0069d9;
        } 