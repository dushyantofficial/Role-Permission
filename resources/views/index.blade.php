<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Acwa Power</title>
    <link rel="shortcut icon" href="public/ACWA_Power_logo.png" type="image/svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('CSS/style.css')}}" />
</head>

<body>
<!-- Logo and Image Section  Start -->
<section class="logo" style="
        padding-top: 50px;
        padding-bottom: 40px;
      ">
    <a href="{{route('index-page')}}" style="display: flex; justify-content: center; width:22%"> <img class="logo-img" src="{{asset('image/ACWA_Power_logo.png')}}" alt="Acwa Power" style="width: 100%;" /></a>
</section>
<section id="company" class="" style="position: relative;">
    <img class="container1" src="{{asset('image/company.png')}}" alt="Acwa Power" />
    <div class="image-text">CAMPAIGN TITLE</div>

</section>
<!-- Logo and Image Section  End -->
{{--@dd(decrypt(request('id')))--}}
<!-- Inverstor Section  Start -->
<section id="investors" class="">
    <h2 class="title" style="
          color: rgba(1, 91, 150, 1);
          text-align: center;
          font-family: 'Open Sans';
          font-weight: 900;
          padding-bottom: 40px;
          padding-top: 40px;
          font-size: 28px;
          line-height: 38.13px;
          text-decoration: underline;
        ">
        About Campaign
    </h2>
    <div class="campaign-box" style="
          background: #dde8f0;
          width: 97%;
          margin: 0 auto;
          border-radius: 10px;
          padding: 50px;
        ">
        <div class="campaign-info">

            Introduction this campaign is inspired by our mission to empower young minds in the kingdom with the objective of inspiring them to share their ideas in our sector ETC.
        </div>
        <br />
        <div class="campaign-info">
            Objective this campaign is inspired by our mission to empower young minds in the kingdom with the objective of inspiring them to share their ideas in our sector ETC.
        </div>
        <br />
        <div class="campaign-info">

            Feedback this campaign is inspired by our mission to empower young minds in the kingdom with the objective of inspiring them to share their ideas in our sector ETC.
        </div>
    </div>
    <br />
    <p class="proceed-text" style="
          text-align: center;
          font-family: 'Open Sans';
          font-size: 22px;
          font-weight: 600;
          line-height: 32.68px;
          color: #000000;
        ">
        Proceed to submit your idea
    </p>
    <div class="button text-center rounded-buttons" style="padding-bottom: 40px; padding-top: 20px">
        <a id="start-button" href="{{route('answer-register-page')}}?id={{request('id')}}">
            <button class="btn rounded-full" style="
            color: #ffffff;
            background-color: #015b96;
            border: 3px solid #23559e;
            width: 150px;
            height: 45px;
            font-family: 'Open Sans';
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
          ">
                <strong>START</strong>
            </button></a>
    </div>
    <div class="constent" style="font-family: 'Open Sans'; font-size: 22px; font-weight: 600; color: #015B96; line-height: 35.41px;">
        Consent:</div>
    <div class="constentdesc" style="font-family: 'Open Sans'; font-size: 15px; font-weight: 400; font-style: italic; color: #5C5B5B; line-height: 29.96px;  padding-bottom: 70px;">
        By making a submission, you understand and agree that you are not claiming any patent, trademark, copyright, or other right in the submission. You represent that everything you submit is your own original work, that you have all necessary rights to disclose
        it to us, and that you are not violating the rights of any third party. You agree to indemnify and hold us harmless from any claims, demands, damages, liabilities and costs (including legal fees) asserted by any third party relating in any
        way to your breach of a representation. If we enter into a development agreement and/or exclusivity arrangement, we will have a shared foreground Intellectual Property.</div>
</section>
<!-- Inverstor SEction  End -->
</body>
<script>
    document.getElementById('start-button').addEventListener('click', function() {
        // const urlParams = new URLSearchParams(window.location.search);
        // const id = urlParams.get('id');
        const nextPageUrl = 'http://localhost/acwa-power-ui/form.html?id=' + id; // Change 'form.html' to your desired next page URL
        window.location.href = nextPageUrl;
    });
</script>
</html>
