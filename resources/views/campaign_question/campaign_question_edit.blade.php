<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"/>

    <title>Document</title>
</head>
<style>
    td {
        text-align: inherit;
    }

    .centered {


        /*margin-left: -100px;*/
    }

    .error {
        color: red;
    }
</style>
<body>
<div class=" centered ">
    @include('Admin.flash-message')
    <form action="{{route('campaign-question-update',$campaign_questions->id)}}" method="post" enctype=""
          id="form_submit">
        @csrf
        <table align="center" bgcolor="" width="" cellpadding="5" cellspacing="0" border="0" id="dynamic_field">
            <tbody>
            <tr>
                <td align="right">
                    <b class="label">Campaign Name </b>
                </td>

                <td align="left">
                    <input type="text" name="campaign_new" class="form-control" placeholder=""
                           disabled value="{{$campaign_news->campaign_title}}" required>
                    <input type="hidden" name="campaign_new_id" class="form-control" placeholder=""
                           value="{{$campaign_news->id}}" required>
                </td>
            </tr>

            <tr>
                <td align="right">
                    <b class="label">Question </b>
                </td>
                <td align="left">
                    <input type="text" name="question" value="{{$campaign_questions->question}}" class="form-control"
                           placeholder="Write detail question"
                           required>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <b class="label"> Type </b>
                </td>
                <td align="left">
                    <select class="form-control" style="" id="" name="type" required>
                        <option value="">---Select Type---</option>
                        <option
                            value="idea_details" @if(isset($campaign_questions)){{ $campaign_questions->type == 'idea_details'  ? 'selected' : ''}} @endif>
                            Idea Details
                        </option>
                        <option
                            value="criteria_description" @if(isset($campaign_questions)){{ $campaign_questions->type == 'criteria_description'  ? 'selected' : ''}} @endif>
                            Criteria Description
                        </option>
                        <option
                            value="evaluation_criteria" @if(isset($campaign_questions)){{ $campaign_questions->type == 'evaluation_criteria'  ? 'selected' : ''}} @endif>
                            Evaluation Criteria
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <b class="label">Select Answer Type </b>
                </td>
                <td align="left">
                    <select class="form-control" style="" id="typeDropdown" name="input_type" required>
                        <option value="">---DropDown---</option>
                        <option
                            value="text" @if(isset($campaign_questions)){{ $campaign_questions->input_type == 'text'  ? 'selected' : ''}} @endif>
                            Text
                        </option>
                        <option
                            value="number" @if(isset($campaign_questions)){{ $campaign_questions->input_type == 'number'  ? 'selected' : ''}} @endif>
                            Number
                        </option>
                        <option
                            value="radio" @if(isset($campaign_questions)){{ $campaign_questions->input_type == 'radio'  ? 'selected' : ''}} @endif>
                            Radio
                        </option>
                        <option
                            value="date" @if(isset($campaign_questions)){{ $campaign_questions->input_type == 'date'  ? 'selected' : ''}} @endif>
                            Date
                        </option>
                        <option
                            value="checkbox" @if(isset($campaign_questions)){{ $campaign_questions->input_type == 'checkbox'  ? 'selected' : ''}} @endif>
                            CheckBox
                        </option>
                    </select>
                </td>
            </tr>

            <tr class="radio_checkbox" style="display: none">
                <td>
                    <br>
                    <button type="button" name="add" id="add" class="btn btn-primary">Add More</button>
                </td>
            @php
                $label_names = json_encode($campaign_questions->label_name);
                $input_values = json_encode($campaign_questions->input_value);
            @endphp
            @for ($i = 0; $i < count(json_decode($label_names)); $i++)
                <tr class="radio_checkbox">
                    <td>
                        <b class="label">Label Name</b>
                        <input type="text" name="label_name[]" value="{{ json_decode($label_names)[$i] }}"
                               placeholder="Enter your label Name"
                               class="form-control" required/>
                    </td>
                    <td>
                        <b class="label">Value</b>
                        <input type="text" name="input_value[]" value="{{ json_decode($input_values)[$i] }}"
                               placeholder="Enter your Value"
                               class="form-control"
                               required/>
                    </td>
                    <td>
                        <br>
                        <button type="button" class="btn btn-danger remove-button"
                                onclick="return confirm('Are you sure you want to delete this label?')">X
                        </button>
                    </td>
                </tr>
                @endfor

                </tr>

            </tbody>

        </table>
        <button type="submit" style="position: absolute;
    right: 61.7%;" id="button" class="btn btn-info">Update
        </button>

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
            $('#dynamic_field').append('<tr id="row' + i + '" class="remove_text"><td><b class="label">Label Name </b><input type="text" name="label_name[]" placeholder="Enter your label Name" class="form-control" required/></td><td> <b class="label">Value </b><input type="text" name="input_value[]" placeholder="Enter your value" class="form-control" required/></td><td><br><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

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
        // Attach click event handler to remove buttons
        $(document).on('click', '.remove-button', function () {
            $(this).closest('tr').remove();
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var timeInput = $('#typeDropdown').val();
        if (timeInput == 'radio' || timeInput == 'checkbox') {
            $('.radio_checkbox').show();
            $('.remove_text').show();
        } else {
            $('.radio_checkbox').hide();
            $('.remove_text').hide();
        }
    });
</script>
</body>

</html>

