@extends('layouts.app')


@section('content')

    <style>
        td {
            text-align: inherit;
        }

        .centered {
            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: -50px;
            margin-left: -100px;
        }
    </style>
    <div class=" centered ">
        <form action="" method="post" enctype="">
            <table align="center" bgcolor="" width="" cellpadding="5" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td align="right">
                        <b class="label">Question </b>
                    </td>
                    <td align="left">
                        <input type="text" name="" class="textbox form-control"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <b class="label">Select Answer Type </b>
                    </td>
                    <td align="left">
                        <select class="form-control" style="" name="" id="" required>
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
                <tr height="60">
                    <td align="right">
                        <button class="btn btn-primary">Save</button>
                    </td>
                    <td align="left">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection
