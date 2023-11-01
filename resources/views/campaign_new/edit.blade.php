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
    @include('Admin.flash-message')
    <form action="{{route('campaign-idea-update',$campaign_news->id)}}" method="post" enctype="multipart/form-data" id="form_submit">
        @csrf
        <table align="center" bgcolor="" width="" cellpadding="5" cellspacing="0" border="0" id="dynamic_field">
            <tbody>

            <tr>
                <td align="right">
                    <b class="label">Campaign Title</b>
                </td>
                <td align="left">
                    <input type="text" name="campaign_title"
                           value="{{$campaign_news->campaign_title}}"
                           class="form-control @error('campaign_title') is-invalid @enderror"/>
                    @error('campaign_title')
                    <br> <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td align="right">
                    <b class="label">Campaign Description </b>
                </td>
                <td align="left">
                     <textarea name="campaign_description"
                               class="form-control @error('campaign_description') is-invalid @enderror">{{$campaign_news->campaign_description}}</textarea>
                    @error('campaign_description')
                    <br> <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td align="right">
                    <b class="label">Upload Banner </b>
                </td>
                <td align="left">
                    <input type="file" name="campaign_banner"
                           class="form-control @error('campaign_banner') is-invalid @enderror"/>
                    @error('campaign_banner')
                    <br> <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <img src="{{asset('storage/images/'.$campaign_news->campaign_banner)}}" width="100px">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <b class="label">Start Date </b>
                </td>
                <td align="left">
                    <input type="date" name="start_date"
                           value="{{$campaign_news->start_date}}"
                           class="form-control @error('start_date') is-invalid @enderror"/>
                    @error('start_date')
                    <br> <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td align="right">
                    <b class="label">End Date </b>
                </td>
                <td align="left">
                    <input type="date" name="end_date" value="{{$campaign_news->end_date}}"
                           class="form-control @error('end_date') is-invalid @enderror"/>
                    @error('end_date')
                    <br> <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            </tbody>

        </table>
        <button type="submit" id="button" class="btn btn-info">Update</button>

    </form>
</div>

</body>

</html>
