<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"/>

    <title>Document</title>
</head>
<style>
    td {
        text-align: inherit;
    }

    .centered {
        position: fixed;
        top: 20%;
        left: 50%;
        margin-top: -50px;
        margin-left: -100px;
    }

    .error {
        color: red;
    }
</style>
<body>
<div class=" centered ">
    <form action="#" method="get" enctype="" id="form_submit">
        <table align="center" bgcolor="" width="" cellpadding="5" cellspacing="0" border="0" id="dynamic_field">
            <tbody>
            <tr>
                <td align="right">
                    <b class="label">Question </b>
                </td>
                <td align="left">
                    <input type="text" name="question" class="form-control" placeholder="Write question here" required>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <b class="label">Select Answer Type </b>
                </td>
                <td align="left">
                    <select class="form-control" style="" id="typeDropdown" name="type" required>
                        <option value="">---DropDown---</option>
                        <option value="text">Text</option>
                        <option value="number">Number</option>
                        <option value="radio">Radio</option>
                        <option value="date">Date</option>
                        <option value="checkbox">CheckBox</option>
                        <option value="numberofinput">NumberOfInput</option>
                    </select>
                </td>
            </tr>

            <tr class="radio_checkbox" style="display: none">
                <td>
                    <b class="label">Label Name </b>
                    <input type="text" name="label[]" placeholder="Enter your label Name"
                           class="form-control" required/></td>
                <td>
                    <b class="label">Value </b>
                    <input type="text" name="value[]" placeholder="Enter your Value" class="form-control" required/>
                </td>
                <td>
                   <br> <button type="button" name="add" id="add" class="btn btn-primary">Add More</button>
                </td>
            </tr>

            </tbody>

        </table>
        <button type="submit" id="button" class="btn btn-primary">Save</button>

    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
<script>
    $(document).on('click', '#button', function (e) {
        $('#form_submit').validate({
            rules: {
                errorClass: 'text-danger',
                errorPlacement: function (error, element) {
                    element.after(error);
                }
            },
        });
    });
</script>
<script>

    $(document).ready(function () {

        var i = 1;

        $("#add").click(function () {

            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="remove_text"><td><b class="label">Label Name </b><input type="text" name="label[]" placeholder="Enter your label Name" class="form-control" required/></td><td> <b class="label">Value </b><input type="text" name="value[]" placeholder="Enter your value" class="form-control" required/></td><td><br><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            var confirmDelete = confirm("Are you sure you want to delete this label?");

            if (confirmDelete) {
                $('#row' + button_id + '').remove();
            }
        });


    });
</script>
<script>
    $(document).ready(function () {
        // Attach a change event handler to the dropdown
        $('#typeDropdown').on('change', function () {
            // Get the selected value
            var selectedValue = $(this).val();
            if (selectedValue == 'radio' || selectedValue == 'checkbox') {
                $('.radio_checkbox').show();
                $('.remove_text').show();
            } else {
                $('.radio_checkbox').hide();
                $('.remove_text').hide();
            }
        });
    });
</script>
</body>

</html>
{{--Add Form Collection Link--}}
{{--https://codepen.io/ahasanhabib16/pen/ZEeqoPr--}}
