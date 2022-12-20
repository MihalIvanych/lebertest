<?php include 'header.php';?>
    <h1 class="text-center">Add user to Excel</h1>
    <div class="container-fluid container-sm" style="width:50%; padding-top:10%;">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"placeholder="Name">
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" id="surname" placeholder="Surname">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="count">How much times?</label>
            <input type="number" min="0" class="form-control" id="count" placeholder="Count">
        </div>
        <button type="button" class="btn btn-primary submit">Submit</button>
    </div>
    <script>

        $('.submit').click(function(){
            sendData();
        });
        function sendData() {
            let name=$('#name').val();
            let surname=$('#surname').val();
            let email=$('#email').val();
            let count=$('#count').val();
            if(count<0){
                count=1;
            }
            $.ajax({
                headers: {
                    "Accept": "application/json; odata=verbose"
                },
                url: '/createexcel.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    name: name,
                    surname: surname,
                    email: email,
                    count: count,
                }
                , success: function (response) {
                    console.log(response);
                }, error: function (error) {
                    console.log(error);
                }

            });
            alert('File was saved in files/docs')
        }
    </script>
<?php include 'footer.php';?>