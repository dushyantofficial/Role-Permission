@extends('emails.layouts.app')

@section('content')


     <table width="900px" cellpadding="20" cellspacing="0" border="1" id="backgroundTable" st-sortable="header" style="margin:0 auto;background: #f9f9f9;border:0; font-family:arial;">
         <tbody>
            <tr style="background: #ecf4f7;">
               <td style="border-bottom: 2px solid #79b7ce;border-top:none; border-left:none;border-right:none;"><img src="#" style="width:120px;"></td>
               <td style="text-align:right;border-top:none; border-left:none;border-right:none;border-bottom: 2px solid #79b7ce;">

                  <p style="margin:0; line-height:26px"></p>
                  <p style="margin:0; font-size:16px; text-transform: uppercase; font-weight:bold;line-height:26px">My cloudparticles</p>
               </td>
            </tr>

            <tr style="padding:15px 10px">
               <td colspan="4" style="border:0">

               	<p style=" font-size: 16px; font-family:arial;">
				{!! html_entity_decode($data) !!}
{{--                    {{$data}}--}}
			</p>
			</td>

 			</tr>

 			@include('emails.layouts.footer')



        </table>


@endsection
