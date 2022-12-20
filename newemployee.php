<?php include 'header.php';?>
<h1 class="text-center">Create new user</h1>
<div class="container-fluid container-sm" style="width:50%; padding-top:10%;">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name"placeholder="Name">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" min="18" max="110" class="form-control" id="age" placeholder="Age">
    </div>
    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" min="0" class="form-control" id="salary" placeholder="Salary">
    </div>
    <button type="button" class="btn btn-primary submit">Submit</button>
</div>
<script>

    $('.submit').click(function(){
        sendData();
    });
    function sendData() {
        let name=$('#name').val();
        let salary=$('#salary').val();
        let age=$('#age').val();
        $.ajax({
            headers: {
                "Accept": "application/json; odata=verbose"
            },
            url: '/createemp.php',
            method: 'POST',
            dataType: 'json',
            data: {
                name: name,
                age: age,
                salary: salary,
            }
            , success: function (response) {
                alert(response);
            }, error: function (error) {
                alert(error);
            }

        });
    }
</script>
<?php include 'footer.php';?>
