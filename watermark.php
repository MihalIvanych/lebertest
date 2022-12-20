<?php include 'header.php';?>
    <h1 class="text-center">Watermark image</h1>
<div class="container-fluid" style="width:80%; padding-top: 10%">
    <div class="row">
        <div class="col">
            <img src="/files/images/jpg.jpg" class="rounded float-start" style="width:300px">

        </div>
        <div class="col">
            <img src="files/images/png.png" class="rounded float-start" style="width:300px">
        </div>
    </div>
    <div class="row">
        <div class="col"><button type="button" id='jpg' class="btn btn-primary watermark">Watermark JPG</button></div>
        <div class="col"><button type="button" id='png' class="btn btn-primary watermark">Watermark PNG</button></div>
    </div>
    <div class="row">
        <div id="result" class="col">

        </div>
    </div>
</div>
<script>
    $('.watermark').click(function(){
        $('#result').text("");
        hideButtons();
        let type=$(this).attr('id');
        let num=Math.floor(Math.random() * 9999);
        sendData(type, num);
    });
    function hideButtons(){
        $('.watermark').each(function(){
            $(this).hide();
        })
    }
    function sendData(type, num) {
        $.ajax({
            headers: {
                "Accept": "application/json; odata=verbose"
            },
            url: '/createwatermark.php',
            method: 'POST',
            dataType: 'json',
            data: {
                type: type,
                num: num,
            }
            , success: function (response) {
                $('#result').append('<img style="width:300px" src="files/images/generated/'+num+'.'+type+'">');
            }, error: function (error) {
                $('#result').append('<img style="width:300px" src="files/images/generated/'+num+'.'+type+'">');
            }

        });

    }
</script>
<?php include 'footer.php';?>