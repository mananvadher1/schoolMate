<?php include("../controller/manage_exam_control.php"); ?>

<!-- Main content -->
<div class="d-flex">
    <h1 class="m-0 text-dark m-4">Manage Exams</h1>
</div>
<!-- add eaxm -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body" id="form-container">
                <form action="" id="student-registration" method="post">
                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Add Exam</legend>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Class</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose Class...</option>
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 2</option>
                                        <option value="3">Class 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose Subject...</option>
                                        <option value="gujarati">Gujarati</option>
                                        <option value="maths">Maths</option>
                                        <option value="english">English</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Duration</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option value="">20 min</option>
                                        <option value="">30 min</option>
                                        <option value="">60 min</option>
                                        <option value="">80 min</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="rdate">Result Date</label>
                                    <input type="date" required class="form-control" placeholder="Email Address"
                                        name="rdate">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="">Active</option>
                                        <option value="">Pending</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </fieldset>
</section>

<!-- add exam details -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body" id="form-container">
                <form action="" id="student-registration" method="post">
                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Add Exam Details</legend>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Class</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose Class...</option>
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 2</option>
                                        <option value="3">Class 3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose Subject...</option>
                                        <option value="gujarati">Gujarati</option>
                                        <option value="maths">Maths</option>
                                        <option value="english">English</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="rdate">Exam Date</label>
                                    <input type="date" required class="form-control" placeholder="Email Address"
                                        name="edate">
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="">Exam Time</label>
                                    <input type="time" required class="form-control" name="etime">
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="">Marks for correct answer</label>
                                    <input type="text" required class="form-control" name="rdate">
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="">Marks for wrong answer</label>
                                    <input type="text" required class="form-control" name="rdate">
                                </div>
                            </div>
                            
                        </div>
                    </fieldset>
</section>

<!-- add questions --><!-- add exam details -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body" id="form-container">
                <form action="" id="student-registration" method="post">
                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Add Questions</legend>
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="rdate">Question</label>
                                    <input type="text" required class="form-control" placeholder="Write question here..."
                                        name="ques">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="rdate">Option 1</label>
                                    <input type="text" required class="form-control" name="op1">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="rdate">Option 2</label>
                                    <input type="text" required class="form-control" name="op2">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="rdate">Option 3</label>
                                    <input type="text" required class="form-control" name="op3">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="rdate">Option 4</label>
                                    <input type="text" required class="form-control" name="op4">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Correct Answer</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose correct answer...</option>
                                        <option value="op1">Option 1</option>
                                        <option value="op2">Option 2</option>
                                        <option value="op3">Option 3</option>
                                        <option value="op4">Option 4</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </fieldset>
</section>


<?php include("../includes/footer.php"); ?>