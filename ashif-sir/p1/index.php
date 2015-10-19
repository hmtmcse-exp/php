<html>
<head>
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".addCF").click(function(){
                $("#customFields").append('<tr valign="top"><td><input type="text" class="code" id="customFieldName" name="designation[]" value="" placeholder="Designation" /></td><td><input type="text" class="code" id="customFieldValue" name="institute[]" value="" placeholder="Institute" /></td><td><input type="text" class="code" id="customFieldName" name="from[]" value="" placeholder="From" /></td><td><input type="text" class="code" id="customFieldValue" name="to[]" value="" placeholder="To" /></td><td><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
            });
            $("#customFields").on('click','.remCF',function(){
                $(this).parent().parent().remove();
            });
        });
    </script>
</head>
<body>
<form action="save.php" method="post">
<table class="form-table" id="customFields">
    <tr>
        <th>Designation</th>
        <th>Institute</th>
        <th>From</th>
        <th>To</th>
    </tr>
    <tr valign="top">
        <td><input type="text" class="code" id="customFieldName" name="designation[]" value="" placeholder="Designation" /></td>
        <td><input type="text" class="code" id="customFieldValue" name="institute[]" value="" placeholder="Institute" /></td>
        <td><input type="text" class="code" id="customFieldName" name="from[]" value="" placeholder="From" /></td>
        <td><input type="text" class="code" id="customFieldValue" name="to[]" value="" placeholder="To" /></td>
        <td><a href="#" class="addCF">Add</a></td>
    </tr>
</table>
    <input type="submit" value="save"/>
</form>
</body>
</html>