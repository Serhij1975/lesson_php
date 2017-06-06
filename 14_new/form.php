<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Data input</title>
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $(function () {
            $('#user_form').on('submit', function (e) {
                e.preventDefault();
                var $that = $(this),
                    formData = new FormData($that.get(0));
                formData.append('date_upl', new Date());
                $.ajax({
                    url: 'server.php',
                    type: $that.attr('method'),
                    contentType: false,
                    processData: false,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        $('#title').val('');
                        $('#description').val('');
                        $('#price').val('');
                        $('#Err').text(data);
                    }
                });
            });
        });
    </script>

<style type="text/css">
        body {
            background: #fffbfb;            
            font-size: 14px;
        }

        form {
            margin: 0 auto;
            padding: 10px;
            background: #a3a2ff;
            width: 600px;
   
            color: #000000;
            box-shadow: 0 0 10px #000000;

        }

        #out {
            margin: 0 auto;
            color: #000000;
            width: 550px;
        }

        .error {
            color: red;
        }

        .hide {
            display: none;
        }

        #err {
            color: red;
        }
    </style>

</head>
<body>

<pre>
<form action="" method="post" enctype="multipart/form-data" id="user_form">
    <p id="Err"></p>
    <select name="company">
    <?php include 'connection.php';
    $res = mysqli_query($mysqli, "SELECT  `company`, `supplier3_id` FROM `suppliers3` WHERE 1");
    while ($row = mysqli_fetch_array($res)) {

        echo "<option value='$row[1]'> $row[0] </option>";
    }

    ?>
    </select>
    <div id="out">Enter the title: <input name="title" value="" id="title"></div>
     <div class="error hide" id="title_error">Название товара мало</div>
    <div id="out">Enter the description: <input name="description" value="" id="description"></div>
     <div class="error hide" id="description_error">Описание короткое</div>
    <div id="out">Enter the price:  <input name="price" value="" id="price"></div>
     <div class="error hide" id="price_error">Цена меньше 2 символов</div>
    <div id="out">Download:      <input type="file" name="up" id="up"> </div>
    <div>        <input type="submit" value="Send"></div>

<script type="text/javascript">
    $(function () {
        var form = $("#user_form");
        form.on('submit', onSubmit);
        function onSubmit(event) {
            var f_title = $('#title');
            var l_description = $('#description');
            var c_price = $('#price');
            var valid = true;
            if (f_title.val().length <= 2) {
                valid = false;
                $('#title_error').removeClass('hide');
            } else {
                $('#title_error').addClass('hide');
            }
            if (l_description.val().length <= 2) {
                valid = false;
                $('#description_error').removeClass('hide');
            } else {
                $('#description_error').addClass('hide');
            }
            if (c_price.val().length <= 2) {
                valid = false;
                $('#price_error').removeClass('hide');
            } else {
                $('#price_error').addClass('hide');
            }
            if (!valid) {
                event.preventDefault();
            }
        }
    });
</script>
</pre>
</form>

</body>
</html>
