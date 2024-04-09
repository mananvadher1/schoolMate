<?php include ("../controller/change_password_control.php"); ?>

<style>
    body {
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 100px;
    }

    .form-container {
        border: 3px solid #ced4da;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 5px;
    }

    .form-group label {
        text-align: left;
    }
</style>

<div class="container">
    <div class="form-container col-md-6">
        <form method="post" action="change_password.php">
            <div class="form-group">
                <label for="current">Current Password</label>
                <input type="password" class="form-control" id="current" name="current">
            </div>
            <div class="form-group">
                <label for="new">New Password</label>
                <input type="password" class="form-control" id="new" name="new">
            </div>
            <div class="form-group">
                <label for="confirm">Confirm Password</label>
                <input type="password" class="form-control" id="confirm" name="confirm">
            </div>
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </div>
</div>

<?php include ("../includes/footer.php"); ?>