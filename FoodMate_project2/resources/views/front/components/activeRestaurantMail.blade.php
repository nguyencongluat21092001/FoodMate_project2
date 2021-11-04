<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <title>Notification | FoodMate</title>
</head>

<body
    style="background-color: white; font-family: trebuchet,sans-serif; margin-top: 0; box-sizing: border-box; line-height: 1.5;">
<div class="container-fluid">
    <div class="container" style="background-color: #f9f9f9; width: 600px; margin: auto; padding: 30px">
        <div class="col-12 mx-auto" style="width: 580px;  margin: 0 auto;">

            <div class="row"
                 style="height: 100px; padding: 10px 20px; line-height: 90px; background-color: #ea1b25; box-sizing: border-box;">
                {{--<h1 class="pl-3"
                    style="color: orange; line-height: 00px; float: left; padding-left: 20px; padding-top: 5px;">
                    <img src="{{$message->embed(asset('front/img/logo.png'))}}"
                         height="40" alt="logo">
                </h1>--}}
                <h1 class="pl-2"
                    style="color: whitesmoke; line-height: 30px; text-align: center; font-size: 30px;text-transform: capitalize;font-weight: 500;">
                    FoodMate
                </h1>
            </div>

            <div class="row" style="background-color: #1a1a1a;   padding: 35px; color: white;">
                <div class="container-fluid">
                    <h3 class="m-0 p-0 mt-4" style="margin-top: 0; font-size: 28px; font-weight: 500;">
                        <strong style="font-size: 32px;">Registration Notification</strong>
                        <br>
                        Your restaurant has been active!
                    </h3>
                </div>
            </div>

            <div class="row mt-2 p-4" style="background-color: white; margin-top: 15px; padding: 20px;">
                <table>
                    <tr>
                        <td>
                            <img
                                src="https://ci6.googleusercontent.com/proxy/8eUxMUXMkvgUKX8veBCRQM5N7-jXP0Wx8KjQLaGDch2DnV_5HYw9PMgJXsoqgSR_jonTY9jAftWPKNsN5W9cUUneQ9hz7IhxH4rIXNzHMm0ijbsNjHB9m7g6XfJJ=s0-d-e1-ft#https://www.bambooairways.com/reservation/common/hosted-images/tickets.jpg"
                                alt="">
                        </td>

                            <td class="pl-3" style=" padding-left:15px;">
                                <span class="d-inline"
                                      style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                    Your restaurant registration has been active, now you can manage your restaurant by your account. Just come back to website to get more information and start your business now !
                                </span>
                            </td>
                    </tr>
                </table>
            </div>
            <div class="row mt-2" style="margin-top: 15px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="color: whitesmoke ;background-color: #1a1a1a; padding: 10px 0 10px 20px;">
                        <b>Details</b>
                    </div>
                    <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px 10px 20px;">
                        <table class="table table-sm table-hover"
                               style="text-align: left;  width: 100%; margin-bottom: 5px; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="border-top: 1px solid #dee2e6; padding: 5px 0;">
                                       Package :
                                    </td>
                                    <td style="border-top: 1px solid #dee2e6; padding: 5px 20px 5px 0; text-align: right;">
                                        {{$restaurant->package}} months
                                    </td>
                                </tr>
                            <tr>
                                <td style="border-top: 1px solid #dee2e6; padding: 5px 0;">
                                    Start-date:
                                </td>
                                <td style="border-top: 1px solid #dee2e6; padding: 5px 20px 5px 0; text-align: right;">
                                    {{$restaurant->start_date}}
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #dee2e6; padding: 5px 0;">
                                    End-date:
                                </td>
                                <td style="border-top: 1px solid #dee2e6; padding: 5px 20px 5px 0; text-align: right;">
                                    {{$restaurant->end_date}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <b><span style="text-transform: capitalize">FoodMate</span> thank you <3.</b>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>

</html>
